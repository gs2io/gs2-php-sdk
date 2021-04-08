<?php


namespace Gs2\Core\Net;


use Exception;
use Gs2\Core\Exception\BadGatewayException;
use Gs2\Core\Exception\BadRequestException;
use Gs2\Core\Exception\ConflictException;
use Gs2\Core\Exception\InternalServerErrorException;
use Gs2\Core\Exception\NotFoundException;
use Gs2\Core\Exception\QuotaLimitExceededException;
use Gs2\Core\Exception\RequestTimeoutException;
use Gs2\Core\Exception\ServiceUnavailableException;
use Gs2\Core\Exception\UnauthorizedException;

class Gs2RestResponse extends Gs2Response {

    /**
     * Gs2RestResponse constructor.
     * @param string $message
     * @param int $statusCode
     */
    public function __construct(string $message, int $statusCode)
    {
        parent::__construct($message);

        $errorMessage = null;
        try
        {
            $errorMessageJson = json_decode($message, true)["message"];
            if ($errorMessageJson == null) {
                $errorMessage = $message;
            } else {
                $errorMessage = json_decode($errorMessageJson, true);
            }
        }
        catch (Exception $e)
        {
            $errorMessage = $message;
        }

        switch ($statusCode) {
            case 400:
                $this->exception = new BadRequestException($errorMessage);
                break;
            case 401:
                $this->exception = new UnauthorizedException($errorMessage);
                break;
            case 502:
                $this->exception = new BadGatewayException($errorMessage);
                break;
            case 409:
                $this->exception = new ConflictException($errorMessage);
                break;
            case 500:
                $this->exception = new InternalServerErrorException($errorMessage);
                break;
            case 404:
                $this->exception = new NotFoundException($errorMessage);
                break;
            case 402:
                $this->exception = new QuotaLimitExceededException($errorMessage);
                break;
            case 408:
                $this->exception = new RequestTimeoutException($errorMessage);
                break;
            case 503:
                $this->exception = new ServiceUnavailableException($errorMessage);
                break;
        }
    }
}