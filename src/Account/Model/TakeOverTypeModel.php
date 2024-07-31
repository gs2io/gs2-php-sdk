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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


class TakeOverTypeModel implements IModel {
	/**
     * @var string
	 */
	private $takeOverTypeModelId;
	/**
     * @var int
	 */
	private $type;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var OpenIdConnectSetting
	 */
	private $openIdConnectSetting;
	public function getTakeOverTypeModelId(): ?string {
		return $this->takeOverTypeModelId;
	}
	public function setTakeOverTypeModelId(?string $takeOverTypeModelId) {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
	}
	public function withTakeOverTypeModelId(?string $takeOverTypeModelId): TakeOverTypeModel {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
		return $this;
	}
	public function getType(): ?int {
		return $this->type;
	}
	public function setType(?int $type) {
		$this->type = $type;
	}
	public function withType(?int $type): TakeOverTypeModel {
		$this->type = $type;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): TakeOverTypeModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getOpenIdConnectSetting(): ?OpenIdConnectSetting {
		return $this->openIdConnectSetting;
	}
	public function setOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting) {
		$this->openIdConnectSetting = $openIdConnectSetting;
	}
	public function withOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting): TakeOverTypeModel {
		$this->openIdConnectSetting = $openIdConnectSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?TakeOverTypeModel {
        if ($data === null) {
            return null;
        }
        return (new TakeOverTypeModel())
            ->withTakeOverTypeModelId(array_key_exists('takeOverTypeModelId', $data) && $data['takeOverTypeModelId'] !== null ? $data['takeOverTypeModelId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withOpenIdConnectSetting(array_key_exists('openIdConnectSetting', $data) && $data['openIdConnectSetting'] !== null ? OpenIdConnectSetting::fromJson($data['openIdConnectSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "takeOverTypeModelId" => $this->getTakeOverTypeModelId(),
            "type" => $this->getType(),
            "metadata" => $this->getMetadata(),
            "openIdConnectSetting" => $this->getOpenIdConnectSetting() !== null ? $this->getOpenIdConnectSetting()->toJson() : null,
        );
    }
}