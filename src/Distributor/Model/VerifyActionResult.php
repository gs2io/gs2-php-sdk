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


class VerifyActionResult implements IModel {
	/**
     * @var string
	 */
	private $action;
	/**
     * @var string
	 */
	private $verifyRequest;
	/**
     * @var int
	 */
	private $statusCode;
	/**
     * @var string
	 */
	private $verifyResult;
	public function getAction(): ?string {
		return $this->action;
	}
	public function setAction(?string $action) {
		$this->action = $action;
	}
	public function withAction(?string $action): VerifyActionResult {
		$this->action = $action;
		return $this;
	}
	public function getVerifyRequest(): ?string {
		return $this->verifyRequest;
	}
	public function setVerifyRequest(?string $verifyRequest) {
		$this->verifyRequest = $verifyRequest;
	}
	public function withVerifyRequest(?string $verifyRequest): VerifyActionResult {
		$this->verifyRequest = $verifyRequest;
		return $this;
	}
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}
	public function withStatusCode(?int $statusCode): VerifyActionResult {
		$this->statusCode = $statusCode;
		return $this;
	}
	public function getVerifyResult(): ?string {
		return $this->verifyResult;
	}
	public function setVerifyResult(?string $verifyResult) {
		$this->verifyResult = $verifyResult;
	}
	public function withVerifyResult(?string $verifyResult): VerifyActionResult {
		$this->verifyResult = $verifyResult;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyActionResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyActionResult())
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withVerifyRequest(array_key_exists('verifyRequest', $data) && $data['verifyRequest'] !== null ? $data['verifyRequest'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withVerifyResult(array_key_exists('verifyResult', $data) && $data['verifyResult'] !== null ? $data['verifyResult'] : null);
    }

    public function toJson(): array {
        return array(
            "action" => $this->getAction(),
            "verifyRequest" => $this->getVerifyRequest(),
            "statusCode" => $this->getStatusCode(),
            "verifyResult" => $this->getVerifyResult(),
        );
    }
}