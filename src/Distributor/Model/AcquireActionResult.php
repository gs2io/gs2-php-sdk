<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;


/**
 * Acquire Action execution result
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#acquireactionresult
 */
class AcquireActionResult implements IModel {
	/**
     * @var string Type of Acquire Action
	 */
	private $action;
	/**
     * @var string JSON string of the request used when executing the action
	 */
	private $acquireRequest;
	/**
     * @var int Status code
	 */
	private $statusCode;
	/**
     * @var string Result content
	 */
	private $acquireResult;
    /** @return string|null Type of Acquire Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Type of Acquire Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Type of Acquire Action
     * @return AcquireActionResult
     */
	public function withAction(?string $action): AcquireActionResult {
		$this->action = $action;
		return $this;
	}
    /** @return string|null JSON string of the request used when executing the action */
	public function getAcquireRequest(): ?string {
		return $this->acquireRequest;
	}
    /** @param string|null $acquireRequest JSON string of the request used when executing the action */
	public function setAcquireRequest(?string $acquireRequest) {
		$this->acquireRequest = $acquireRequest;
	}
    /**
     * @param string|null $acquireRequest JSON string of the request used when executing the action
     * @return AcquireActionResult
     */
	public function withAcquireRequest(?string $acquireRequest): AcquireActionResult {
		$this->acquireRequest = $acquireRequest;
		return $this;
	}
    /** @return int|null Status code */
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}
    /** @param int|null $statusCode Status code */
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}
    /**
     * @param int|null $statusCode Status code
     * @return AcquireActionResult
     */
	public function withStatusCode(?int $statusCode): AcquireActionResult {
		$this->statusCode = $statusCode;
		return $this;
	}
    /** @return string|null Result content */
	public function getAcquireResult(): ?string {
		return $this->acquireResult;
	}
    /** @param string|null $acquireResult Result content */
	public function setAcquireResult(?string $acquireResult) {
		$this->acquireResult = $acquireResult;
	}
    /**
     * @param string|null $acquireResult Result content
     * @return AcquireActionResult
     */
	public function withAcquireResult(?string $acquireResult): AcquireActionResult {
		$this->acquireResult = $acquireResult;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionResult {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionResult())
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withAcquireRequest(array_key_exists('acquireRequest', $data) && $data['acquireRequest'] !== null ? $data['acquireRequest'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withAcquireResult(array_key_exists('acquireResult', $data) && $data['acquireResult'] !== null ? $data['acquireResult'] : null);
    }

    public function toJson(): array {
        return array(
            "action" => $this->getAction(),
            "acquireRequest" => $this->getAcquireRequest(),
            "statusCode" => $this->getStatusCode(),
            "acquireResult" => $this->getAcquireResult(),
        );
    }
}