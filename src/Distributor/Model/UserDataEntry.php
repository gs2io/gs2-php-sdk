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


class UserDataEntry implements IModel {
	/**
     * @var string
	 */
	private $service;
	/**
     * @var string
	 */
	private $namespaceName;
	/**
     * @var string
	 */
	private $kind;
	/**
     * @var string
	 */
	private $payload;
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): UserDataEntry {
		$this->service = $service;
		return $this;
	}
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UserDataEntry {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getKind(): ?string {
		return $this->kind;
	}
	public function setKind(?string $kind) {
		$this->kind = $kind;
	}
	public function withKind(?string $kind): UserDataEntry {
		$this->kind = $kind;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
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