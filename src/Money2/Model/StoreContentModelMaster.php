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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Store Content Model Master
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#storecontentmodelmaster
 */
class StoreContentModelMaster implements IModel {
	/**
     * @var string Content Model Master GRN
	 */
	private $storeContentModelId;
	/**
     * @var string Store Content Model name
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
     * @var AppleAppStoreContent Apple App Store Content
	 */
	private $appleAppStore;
	/**
     * @var GooglePlayContent Google Play Content
	 */
	private $googlePlay;
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
    /** @return string|null Content Model Master GRN */
	public function getStoreContentModelId(): ?string {
		return $this->storeContentModelId;
	}
    /** @param string|null $storeContentModelId Content Model Master GRN */
	public function setStoreContentModelId(?string $storeContentModelId) {
		$this->storeContentModelId = $storeContentModelId;
	}
    /**
     * @param string|null $storeContentModelId Content Model Master GRN
     * @return StoreContentModelMaster
     */
	public function withStoreContentModelId(?string $storeContentModelId): StoreContentModelMaster {
		$this->storeContentModelId = $storeContentModelId;
		return $this;
	}
    /** @return string|null Store Content Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Store Content Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Store Content Model name
     * @return StoreContentModelMaster
     */
	public function withName(?string $name): StoreContentModelMaster {
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
     * @return StoreContentModelMaster
     */
	public function withDescription(?string $description): StoreContentModelMaster {
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
     * @return StoreContentModelMaster
     */
	public function withMetadata(?string $metadata): StoreContentModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return AppleAppStoreContent|null Apple App Store Content */
	public function getAppleAppStore(): ?AppleAppStoreContent {
		return $this->appleAppStore;
	}
    /** @param AppleAppStoreContent|null $appleAppStore Apple App Store Content */
	public function setAppleAppStore(?AppleAppStoreContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
    /**
     * @param AppleAppStoreContent|null $appleAppStore Apple App Store Content
     * @return StoreContentModelMaster
     */
	public function withAppleAppStore(?AppleAppStoreContent $appleAppStore): StoreContentModelMaster {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
    /** @return GooglePlayContent|null Google Play Content */
	public function getGooglePlay(): ?GooglePlayContent {
		return $this->googlePlay;
	}
    /** @param GooglePlayContent|null $googlePlay Google Play Content */
	public function setGooglePlay(?GooglePlayContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
    /**
     * @param GooglePlayContent|null $googlePlay Google Play Content
     * @return StoreContentModelMaster
     */
	public function withGooglePlay(?GooglePlayContent $googlePlay): StoreContentModelMaster {
		$this->googlePlay = $googlePlay;
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
     * @return StoreContentModelMaster
     */
	public function withCreatedAt(?int $createdAt): StoreContentModelMaster {
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
     * @return StoreContentModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): StoreContentModelMaster {
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
     * @return StoreContentModelMaster
     */
	public function withRevision(?int $revision): StoreContentModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?StoreContentModelMaster {
        if ($data === null) {
            return null;
        }
        return (new StoreContentModelMaster())
            ->withStoreContentModelId(array_key_exists('storeContentModelId', $data) && $data['storeContentModelId'] !== null ? $data['storeContentModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlayContent::fromJson($data['googlePlay']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "storeContentModelId" => $this->getStoreContentModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}