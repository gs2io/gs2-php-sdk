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


class BatchResultPayload implements IModel {
	/**
     * @var string
	 */
	private $requestId;
	/**
     * @var int
	 */
	private $statusCode;
	/**
     * @var string
	 */
	private $resultPayload;
	public function getRequestId(): ?string {
		return $this->requestId;
	}
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}
	public function withRequestId(?string $requestId): BatchResultPayload {
		$this->requestId = $requestId;
		return $this;
	}
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}
	public function withStatusCode(?int $statusCode): BatchResultPayload {
		$this->statusCode = $statusCode;
		return $this;
	}
	public function getResultPayload(): ?string {
		return $this->resultPayload;
	}
	public function setResultPayload(?string $resultPayload) {
		$this->resultPayload = $resultPayload;
	}
	public function withResultPayload(?string $resultPayload): BatchResultPayload {
		$this->resultPayload = $resultPayload;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchResultPayload {
        if ($data === null) {
            return null;
        }
        return (new BatchResultPayload())
            ->withRequestId(array_key_exists('requestId', $data) && $data['requestId'] !== null ? $data['requestId'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withResultPayload(array_key_exists('resultPayload', $data) && $data['resultPayload'] !== null ? $data['resultPayload'] : null);
    }

    public function toJson(): array {
        return array(
            "requestId" => $this->getRequestId(),
            "statusCode" => $this->getStatusCode(),
            "resultPayload" => $this->getResultPayload(),
        );
    }
}