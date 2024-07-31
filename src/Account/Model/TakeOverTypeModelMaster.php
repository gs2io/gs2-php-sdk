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


class TakeOverTypeModelMaster implements IModel {
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
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var OpenIdConnectSetting
	 */
	private $openIdConnectSetting;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getTakeOverTypeModelId(): ?string {
		return $this->takeOverTypeModelId;
	}
	public function setTakeOverTypeModelId(?string $takeOverTypeModelId) {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
	}
	public function withTakeOverTypeModelId(?string $takeOverTypeModelId): TakeOverTypeModelMaster {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
		return $this;
	}
	public function getType(): ?int {
		return $this->type;
	}
	public function setType(?int $type) {
		$this->type = $type;
	}
	public function withType(?int $type): TakeOverTypeModelMaster {
		$this->type = $type;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): TakeOverTypeModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): TakeOverTypeModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getOpenIdConnectSetting(): ?OpenIdConnectSetting {
		return $this->openIdConnectSetting;
	}
	public function setOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting) {
		$this->openIdConnectSetting = $openIdConnectSetting;
	}
	public function withOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting): TakeOverTypeModelMaster {
		$this->openIdConnectSetting = $openIdConnectSetting;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): TakeOverTypeModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): TakeOverTypeModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): TakeOverTypeModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?TakeOverTypeModelMaster {
        if ($data === null) {
            return null;
        }
        return (new TakeOverTypeModelMaster())
            ->withTakeOverTypeModelId(array_key_exists('takeOverTypeModelId', $data) && $data['takeOverTypeModelId'] !== null ? $data['takeOverTypeModelId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withOpenIdConnectSetting(array_key_exists('openIdConnectSetting', $data) && $data['openIdConnectSetting'] !== null ? OpenIdConnectSetting::fromJson($data['openIdConnectSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "takeOverTypeModelId" => $this->getTakeOverTypeModelId(),
            "type" => $this->getType(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "openIdConnectSetting" => $this->getOpenIdConnectSetting() !== null ? $this->getOpenIdConnectSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}