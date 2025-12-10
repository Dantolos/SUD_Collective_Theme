
//---------------------------------
//ANCHOR LINKS
//---------------------------------

let ANCHOR = new se2_Anchor();
ANCHOR.goTO();

// MENU
// JavaScript to handle the dropdown menu
const parentMenuItems = document.querySelectorAll(
  ".se2-navigation .se2-submenu",
);

parentMenuItems.forEach((menuItem) => {
  const parentLink = menuItem.querySelector(".parent-menu-item");

  menuItem.addEventListener("mouseover", () => {
    menuItem.querySelector(".se2-sub-menu").style.display = "block";
  });

  menuItem.addEventListener("mouseout", (event) => {
    const relatedTarget = event.relatedTarget;
    if (!relatedTarget || !menuItem.contains(relatedTarget)) {
      menuItem.querySelector(".se2-sub-menu").style.display = "none";
    }
  });
});

//MOBILE BURGER MENU
const burgerMenu = document.querySelector(".burger-menu-trigger");
const mobileMenu = document.querySelector(".burger-menu-wrapper");
const closeButton = document.querySelector(".burger-menu-closer");

burgerMenu.addEventListener("click", () => {
  console.log('asdsffs')
  gsap.fromTo(
    mobileMenu.querySelectorAll("div,ul"),
    { duration: 0.1, stagger: 0.1, y: -200 },
    { y: 0 },
  );
  gsap.fromTo(
    mobileMenu,
    { duration: 0.05, y: -400, x: 0, borderRadius: "0", scale: 1.4 },
    { y: 0, x: 0, borderRadius: "0", scale: 1, opacity: 1 },
  );
  mobileMenu.classList.add("open");
});

closeButton.addEventListener("click", () => {
  gsap.fromTo(
    mobileMenu.querySelectorAll("div,ul"),
    { duration: 0.1, stagger: 0.1, y: 0 },
    { y: -200 },
  );
  gsap.fromTo(
    mobileMenu,
    { duration: 0.05, y: 0, opacity: 1 },
    { y: -500, opacity: 0 },
  );
  console.log("close");
  setTimeout(() => {
    mobileMenu.classList.remove("open");
  }, 500);
});
