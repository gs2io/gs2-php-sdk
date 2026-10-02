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


/**
 * Takeover Type Model Master
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#takeovertypemodelmaster
 */
class TakeOverTypeModelMaster implements IModel {
	/**
     * @var string Takeover Type Model Master GRN
	 */
	private $takeOverTypeModelId;
	/**
     * @var int Slot Number
	 */
	private $type;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var OpenIdConnectSetting OpenID Connect Configuration
	 */
	private $openIdConnectSetting;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Takeover Type Model Master GRN */
	public function getTakeOverTypeModelId(): ?string {
		return $this->takeOverTypeModelId;
	}
    /** @param string|null $takeOverTypeModelId Takeover Type Model Master GRN */
	public function setTakeOverTypeModelId(?string $takeOverTypeModelId) {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
	}
    /**
     * @param string|null $takeOverTypeModelId Takeover Type Model Master GRN
     * @return TakeOverTypeModelMaster
     */
	public function withTakeOverTypeModelId(?string $takeOverTypeModelId): TakeOverTypeModelMaster {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return TakeOverTypeModelMaster
     */
	public function withType(?int $type): TakeOverTypeModelMaster {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return TakeOverTypeModelMaster
     */
	public function withDescription(?string $description): TakeOverTypeModelMaster {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return TakeOverTypeModelMaster
     */
	public function withMetadata(?string $metadata): TakeOverTypeModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return OpenIdConnectSetting|null OpenID Connect Configuration */
	public function getOpenIdConnectSetting(): ?OpenIdConnectSetting {
		return $this->openIdConnectSetting;
	}
    /** @param OpenIdConnectSetting|null $openIdConnectSetting OpenID Connect Configuration */
	public function setOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting) {
		$this->openIdConnectSetting = $openIdConnectSetting;
	}
    /**
     * @param OpenIdConnectSetting|null $openIdConnectSetting OpenID Connect Configuration
     * @return TakeOverTypeModelMaster
     */
	public function withOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting): TakeOverTypeModelMaster {
		$this->openIdConnectSetting = $openIdConnectSetting;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return TakeOverTypeModelMaster
     */
	public function withCreatedAt(?int $createdAt): TakeOverTypeModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return TakeOverTypeModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): TakeOverTypeModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return TakeOverTypeModelMaster
     */
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