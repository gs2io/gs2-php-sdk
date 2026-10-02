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

namespace Gs2\SerialKey\Model;

use Gs2\Core\Model\IModel;


/**
 * Campaign Model Master Data
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#campaignmodelmaster
 */
class CampaignModelMaster implements IModel {
	/**
     * @var string Campaign Model Master Data GRN
	 */
	private $campaignId;
	/**
     * @var string Campaign Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var bool Whether to allow redemption with campaign code
	 */
	private $enableCampaignCode;
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
    /** @return string|null Campaign Model Master Data GRN */
	public function getCampaignId(): ?string {
		return $this->campaignId;
	}
    /** @param string|null $campaignId Campaign Model Master Data GRN */
	public function setCampaignId(?string $campaignId) {
		$this->campaignId = $campaignId;
	}
    /**
     * @param string|null $campaignId Campaign Model Master Data GRN
     * @return CampaignModelMaster
     */
	public function withCampaignId(?string $campaignId): CampaignModelMaster {
		$this->campaignId = $campaignId;
		return $this;
	}
    /** @return string|null Campaign Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Campaign Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Campaign Model name
     * @return CampaignModelMaster
     */
	public function withName(?string $name): CampaignModelMaster {
		$this->name = $name;
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
     * @return CampaignModelMaster
     */
	public function withDescription(?string $description): CampaignModelMaster {
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
     * @return CampaignModelMaster
     */
	public function withMetadata(?string $metadata): CampaignModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return bool|null Whether to allow redemption with campaign code */
	public function getEnableCampaignCode(): ?bool {
		return $this->enableCampaignCode;
	}
    /** @param bool|null $enableCampaignCode Whether to allow redemption with campaign code */
	public function setEnableCampaignCode(?bool $enableCampaignCode) {
		$this->enableCampaignCode = $enableCampaignCode;
	}
    /**
     * @param bool|null $enableCampaignCode Whether to allow redemption with campaign code
     * @return CampaignModelMaster
     */
	public function withEnableCampaignCode(?bool $enableCampaignCode): CampaignModelMaster {
		$this->enableCampaignCode = $enableCampaignCode;
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
     * @return CampaignModelMaster
     */
	public function withCreatedAt(?int $createdAt): CampaignModelMaster {
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
     * @return CampaignModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): CampaignModelMaster {
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
     * @return CampaignModelMaster
     */
	public function withRevision(?int $revision): CampaignModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?CampaignModelMaster {
        if ($data === null) {
            return null;
        }
        return (new CampaignModelMaster())
            ->withCampaignId(array_key_exists('campaignId', $data) && $data['campaignId'] !== null ? $data['campaignId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withEnableCampaignCode(array_key_exists('enableCampaignCode', $data) ? $data['enableCampaignCode'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "campaignId" => $this->getCampaignId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "enableCampaignCode" => $this->getEnableCampaignCode(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}