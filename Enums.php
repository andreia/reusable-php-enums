<?php

enum HTTPResponseStatus: int
{
    case CONTINUE = 100;
    case SWITCHING_PROTOCOL = 101;
    case PROCESSING = 102;
    case EARLY_HINTS = 103;
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NON_AUTHORITATIVE_INFORMATION = 203;
    case NO_CONTENT = 204;
    case RESET_CONTENT = 205;
    case PARTIAL_CONTENT = 206;
    case MULTI_STATUS = 207;
    case ALREADY_REPORTED = 208;
    case IM_USED = 226;
    case MULTIPLE_CHOICE = 300;
    case MOVED_PERMANENTLY = 301;
    case FOUND = 302;
    case SEE_OTHER = 303;
    case NOT_MODIFIED = 304;
    case USE_PROXY = 305;
    case UNUSED = 306;
    case TEMPORARY_REDIRECT = 307;
    case PERMANENT_REDIRECT = 308;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case PAYMENT_REQUIRED = 402;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case NOT_ACCEPTABLE = 406;
    case PROXY_AUTHENTICATION_REQUIRED = 407;
    case REQUEST_TIMEOUT = 408;
    case CONFLICT = 409;
    case GONE = 410;
    case LENGTH_REQUIRED = 411;
    case PRECONDITION_FAILED = 412;
    case PAYLOAD_TOO_LARGE = 413;
    case URI_TOO_LONG = 414;
    case UNSUPPORTED_MEDIA_TYPE = 415;
    case RANGE_NOT_SATISFIABLE = 416;
    case EXPECTATION_FAILED = 417;
    case IM_A_TEAPOT = 418;
    case MISDIRECTED_REQUEST = 421;
    case UNPROCESSABLE_ENTITY = 422;
    case LOCKED = 423;
    case FAILED_DEPENDENCY = 424;
    case TOO_EARLY = 425;
    case UPGRADE_REQUIRED = 426;
    case PRECONDITION_REQUIRED = 428;
    case TOO_MANY_REQUESTS = 429;
    case REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    case UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    case INTERNAL_SERVER_ERROR = 500;
    case NOT_IMPLEMENTED = 501;
    case BAD_GATEWAY = 502;
    case SERVICE_UNAVAILABLE = 503;
    case GATEWAY_TIMEOUT = 504;
    case HTTP_VERSION_NOT_SUPPORTED = 505;
    case VARIANT_ALSO_NEGOTIATES = 506;
    case INSUFFICIENT_STORAGE = 507;
    case LOOP_DETECTED = 508;
    case NOT_EXTENDED = 510;
    case NETWORK_AUTHENTICATION_REQUIRED = 511;

    // Informational responses (100–199)
    public function isInformational(): bool
    {
        return $this->value > 99 && $this->value < 200;
    }

    // Successful responses (200–299)
    public function isSuccessful(): bool
    {
        return $this->value > 199 && $this->value < 300;
    }

    // Redirection messages (300–399)
    public function isRedirection(): bool
    {
        return $this->value > 299 && $this->value < 400;
    }

    // Client error responses (400–499)
    public function isClientError(): bool
    {
        return $this->value > 399 && $this->value < 500;
    }

    // Server error responses (500–599)
    public function isServerError(): bool
    {
        return $this->value > 499 && $this->value < 600;
    }
}
                                                        
enum HTTPheaders: string
{
    case WWW_AUTHENTICATE = 'WWW-Authenticate';
    case AUTHORIZATION = 'Authorization';
    case PROXY_AUTHENTICATE = 'Proxy-Authenticate';
    case PROXY_AUTHORIZATION = 'Proxy-Authorization';
    case AGE = 'Age';
    case CACHE_CONTROL = 'Cache-Control';
    case CLEAR_SITE_DATA = 'Clear-Site-Data';
    case EXPIRES = 'Expires';
    case PRAGMA = 'Pragma';
    case WARNING = 'Warning';

    public function isAuthentication(): bool
    {
        return $this->value == self::WWW_AUTHENTICATE->value ||
        $this->value == self::AUTHORIZATION->value ||
        $this->value == self::PROXY_AUTHENTICATE->value ||
        $this->value == self::PROXY_AUTHORIZATION->value;
    }
}
          
enum Alert
{
    case info;
    case success;
    case warning;
    case error;

    public function color(): string
    {
        return match($this)
        {
            Alert::info => 'blue',
            Alert::success => 'green',
            Alert::warning => 'yellow',
            Alert::error => 'red',
        };
    }
}
