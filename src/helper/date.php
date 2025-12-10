<?php

namespace sud\helper\date;

class Date_Format {

    public function formating_Date_Language( $value, $type ) {

        if ( $type === 'time' ) {

            // TIME
            $time  = '';
            $value = strtotime( str_replace( '/', '-', $value ) );
            $lang  = ( apply_filters( 'wpml_current_language', null ) ) ? apply_filters( 'wpml_current_language', null ) : 'en';

            if ( ! $value ) {
                return $time;
            }

            // Skip if time is 00:00
            if ( date( 'H:i', $value ) === '00:00' ) {
                return $time;
            }

            switch ( $lang ) {
                case 'de':
                    $time = date( 'H:i', $value ) . ' Uhr';
                    break;
                case 'fr':
                    $time = date( 'H\hi a', $value );
                    break;
                case 'en':
                default:
                    $time = date( 'h:i a', $value );
                    break;
            }

            return $time;

        } elseif ( $type === 'date' ) {

            // DATE
            $date  = '';
            $value = strtotime( str_replace( '/', '-', $value ) );

            if ( ! $value ) {
                return $date;
            }

            $lang  = ( apply_filters( 'wpml_current_language', null ) ) ? apply_filters( 'wpml_current_language', null ) : 'en';
            $locale = 'en_US';

            switch ( $lang ) {
                case 'de':
                    $locale = 'de_DE';
                    break;
                case 'fr':
                    $locale = 'fr_FR';
                    break;
                case 'en':
                default:
                    $locale = 'en_US';
                    break;
            }

            // Prefer IntlDateFormatter if available (no strftime / setlocale)
            if ( class_exists( '\IntlDateFormatter' ) ) {

                // Pattern roughly equivalent to your original "%e. %B %G"
                // e.g. "1. Januar 2025" / "1 January 2025"
                $pattern = 'd. MMMM y';

                // English originally had no dot, so adjust pattern
                if ( $lang === 'en' ) {
                    $pattern = 'd MMMM y';
                }

                $formatter = new \IntlDateFormatter(
                    $locale,
                    \IntlDateFormatter::LONG,
                    \IntlDateFormatter::NONE,
                    date_default_timezone_get(),
                    \IntlDateFormatter::GREGORIAN,
                    $pattern
                );

                $date = $formatter->format( $value );

                // Fallback if formatting fails
                if ( $date === false ) {
                    $date = $this->fallback_date_format( $value, $lang );
                }

            } else {

                // Fallback without intl extension: plain date() with simple language variants
                $date = $this->fallback_date_format( $value, $lang );
            }

            return $date;
        }

        // If $type is neither 'time' nor 'date'
        return '';
    }

    /**
     * Fallback formatting if IntlDateFormatter is not available.
     */
    protected function fallback_date_format( $timestamp, $lang ) {

        switch ( $lang ) {
            case 'de':
            case 'fr':
                // 1. January 2025 (month name stays in current PHP locale)
                return date( 'j. F Y', $timestamp );
            case 'en':
            default:
                // 1 January 2025
                return date( 'j F Y', $timestamp );
        }
    }

    // Get Daterange between start and end date in steps
    // Example: date_range("2014-01-01", "2014-01-20", "+1 day", "m/d/Y");
    public function date_range( $first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

        $dates   = array();
        $current = strtotime( $first );
        $last    = strtotime( $last );

        while ( $current && $last && $current <= $last ) {
            $dates[] = $current;
            $current = strtotime( $step, $current );
        }

        return $dates;
    }

}
