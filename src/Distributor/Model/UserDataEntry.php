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
 * User Data Entry
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#userdataentry
 */
class UserDataEntry implements IModel {
	/**
     * @var string Service
	 */
	private $service;
	/**
     * @var string Namespace name
	 */
	private $namespaceName;
	/**
     * @var string Kind
	 */
	private $kind;
	/**
     * @var string Payload
	 */
	private $payload;
    /** @return string|null Service */
	public function getService(): ?string {
		return $this->service;
	}
    /** @param string|null $service Service */
	public function setService(?string $service) {
		$this->service = $service;
	}
    /**
     * @param string|null $service Service
     * @return UserDataEntry
     */
	public function withService(?string $service): UserDataEntry {
		$this->service = $service;
		return $this;
	}
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UserDataEntry
     */
	public function withNamespaceName(?string $namespaceName): UserDataEntry {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Kind */
	public function getKind(): ?string {
		return $this->kind;
	}
    /** @param string|null $kind Kind */
	public function setKind(?string $kind) {
		$this->kind = $kind;
	}
    /**
     * @param string|null $kind Kind
     * @return UserDataEntry
     */
	public function withKind(?string $kind): UserDataEntry {
		$this->kind = $kind;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return UserDataEntry
     */
	public function withPayload(?string $payload): UserDataEntry {
		$this->payload = $payload;
		return $this;
	}

    public static function fromJson(?array $data): ?UserDataEntry {
        if ($data === null) {
            return null;
        }
        return (new UserDataEntry())
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withKind(array_key_exists('kind', $data) && $data['kind'] !== null ? $data['kind'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "service" => $this->getService(),
            "namespaceName" => $this->getNamespaceName(),
            "kind" => $this->getKind(),
            "payload" => $this->getPayload(),
        );
    }
}