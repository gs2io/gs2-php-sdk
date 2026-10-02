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
 * Consume Action execution result
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#consumeactionresult
 */
class ConsumeActionResult implements IModel {
	/**
     * @var string Type of Consume Action
	 */
	private $action;
	/**
     * @var string JSON string of the request used when executing the action
	 */
	private $consumeRequest;
	/**
     * @var int Status code
	 */
	private $statusCode;
	/**
     * @var string Result content
	 */
	private $consumeResult;
    /** @return string|null Type of Consume Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Type of Consume Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Type of Consume Action
     * @return ConsumeActionResult
     */
	public function withAction(?string $action): ConsumeActionResult {
		$this->action = $action;
		return $this;
	}
    /** @return string|null JSON string of the request used when executing the action */
	public function getConsumeRequest(): ?string {
		return $this->consumeRequest;
	}
    /** @param string|null $consumeRequest JSON string of the request used when executing the action */
	public function setConsumeRequest(?string $consumeRequest) {
		$this->consumeRequest = $consumeRequest;
	}
    /**
     * @param string|null $consumeRequest JSON string of the request used when executing the action
     * @return ConsumeActionResult
     */
	public function withConsumeRequest(?string $consumeRequest): ConsumeActionResult {
		$this->consumeRequest = $consumeRequest;
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
     * @return ConsumeActionResult
     */
	public function withStatusCode(?int $statusCode): ConsumeActionResult {
		$this->statusCode = $statusCode;
		return $this;
	}
    /** @return string|null Result content */
	public function getConsumeResult(): ?string {
		return $this->consumeResult;
	}
    /** @param string|null $consumeResult Result content */
	public function setConsumeResult(?string $consumeResult) {
		$this->consumeResult = $consumeResult;
	}
    /**
     * @param string|null $consumeResult Result content
     * @return ConsumeActionResult
     */
	public function withConsumeResult(?string $consumeResult): ConsumeActionResult {
		$this->consumeResult = $consumeResult;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeActionResult {
        if ($data === null) {
            return null;
        }
        return (new ConsumeActionResult())
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withConsumeRequest(array_key_exists('consumeRequest', $data) && $data['consumeRequest'] !== null ? $data['consumeRequest'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withConsumeResult(array_key_exists('consumeResult', $data) && $data['consumeResult'] !== null ? $data['consumeResult'] : null);
    }

    public function toJson(): array {
        return array(
            "action" => $this->getAction(),
            "consumeRequest" => $this->getConsumeRequest(),
            "statusCode" => $this->getStatusCode(),
            "consumeResult" => $this->getConsumeResult(),
        );
    }
}