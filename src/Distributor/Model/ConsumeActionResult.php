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


class ConsumeActionResult implements IModel {
	/**
     * @var string
	 */
	private $action;
	/**
     * @var string
	 */
	private $consumeRequest;
	/**
     * @var int
	 */
	private $statusCode;
	/**
     * @var string
	 */
	private $consumeResult;
	public function getAction(): ?string {
		return $this->action;
	}
	public function setAction(?string $action) {
		$this->action = $action;
	}
	public function withAction(?string $action): ConsumeActionResult {
		$this->action = $action;
		return $this;
	}
	public function getConsumeRequest(): ?string {
		return $this->consumeRequest;
	}
	public function setConsumeRequest(?string $consumeRequest) {
		$this->consumeRequest = $consumeRequest;
	}
	public function withConsumeRequest(?string $consumeRequest): ConsumeActionResult {
		$this->consumeRequest = $consumeRequest;
		return $this;
	}
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}
	public function withStatusCode(?int $statusCode): ConsumeActionResult {
		$this->statusCode = $statusCode;
		return $this;
	}
	public function getConsumeResult(): ?string {
		return $this->consumeResult;
	}
	public function setConsumeResult(?string $consumeResult) {
		$this->consumeResult = $consumeResult;
	}
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