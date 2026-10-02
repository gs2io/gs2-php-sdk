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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Money2\Model\AppleAppStoreContent;
use Gs2\Money2\Model\GooglePlayContent;

/**
 * Request for createStoreContentModelMaster: Create store content master
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#createstorecontentmodelmaster
 */
class CreateStoreContentModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Store Content Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var AppleAppStoreContent Apple App Store Content */
    private $appleAppStore;
    /** @var GooglePlayContent Google Play Content */
    private $googlePlay;
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
     * @return CreateStoreContentModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateStoreContentModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return CreateStoreContentModelMasterRequest
     */
	public function withName(?string $name): CreateStoreContentModelMasterRequest {
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
     * @return CreateStoreContentModelMasterRequest
     */
	public function withDescription(?string $description): CreateStoreContentModelMasterRequest {
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
     * @return CreateStoreContentModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateStoreContentModelMasterRequest {
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
     * @return CreateStoreContentModelMasterRequest
     */
	public function withAppleAppStore(?AppleAppStoreContent $appleAppStore): CreateStoreContentModelMasterRequest {
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
     * @return CreateStoreContentModelMasterRequest
     */
	public function withGooglePlay(?GooglePlayContent $googlePlay): CreateStoreContentModelMasterRequest {
		$this->googlePlay = $googlePlay;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStoreContentModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateStoreContentModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlayContent::fromJson($data['googlePlay']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
        );
    }
}