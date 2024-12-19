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


class BatchRequestPayload implements IModel {
	/**
     * @var string
	 */
	private $requestId;
	/**
     * @var string
	 */
	private $service;
	/**
     * @var string
	 */
	private $methodName;
	/**
     * @var string
	 */
	private $parameter;
	public function getRequestId(): ?string {
		return $this->requestId;
	}
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}
	public function withRequestId(?string $requestId): BatchRequestPayload {
		$this->requestId = $requestId;
		return $this;
	}
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): BatchRequestPayload {
		$this->service = $service;
		return $this;
	}
	public function getMethodName(): ?string {
		return $this->methodName;
	}
	public function setMethodName(?string $methodName) {
		$this->methodName = $methodName;
	}
	public function withMethodName(?string $methodName): BatchRequestPayload {
		$this->methodName = $methodName;
		return $this;
	}
	public function getParameter(): ?string {
		return $this->parameter;
	}
	public function setParameter(?string $parameter) {
		$this->parameter = $parameter;
	}
	public function withParameter(?string $parameter): BatchRequestPayload {
		$this->parameter = $parameter;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchRequestPayload {
        if ($data === null) {
            return null;
        }
        return (new BatchRequestPayload())
            ->withRequestId(array_key_exists('requestId', $data) && $data['requestId'] !== null ? $data['requestId'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethodName(array_key_exists('methodName', $data) && $data['methodName'] !== null ? $data['methodName'] : null)
            ->withParameter(array_key_exists('parameter', $data) && $data['parameter'] !== null ? $data['parameter'] : null);
    }

    public function toJson(): array {
        return array(
            "requestId" => $this->getRequestId(),
            "service" => $this->getService(),
            "methodName" => $this->getMethodName(),
            "parameter" => $this->getParameter(),
        );
    }
}