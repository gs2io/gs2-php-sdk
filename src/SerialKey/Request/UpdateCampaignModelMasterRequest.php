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

namespace Gs2\SerialKey\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateCampaignModelMaster: Update Campaign Model Master
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#updatecampaignmodelmaster
 */
class UpdateCampaignModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Campaign Model name */
    private $campaignModelName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var bool Whether to allow redemption with campaign code */
    private $enableCampaignCode;
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
     * @return UpdateCampaignModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateCampaignModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Campaign Model name */
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
    /** @param string|null $campaignModelName Campaign Model name */
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
    /**
     * @param string|null $campaignModelName Campaign Model name
     * @return UpdateCampaignModelMasterRequest
     */
	public function withCampaignModelName(?string $campaignModelName): UpdateCampaignModelMasterRequest {
		$this->campaignModelName = $campaignModelName;
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
     * @return UpdateCampaignModelMasterRequest
     */
	public function withDescription(?string $description): UpdateCampaignModelMasterRequest {
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
     * @return UpdateCampaignModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateCampaignModelMasterRequest {
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
     * @return UpdateCampaignModelMasterRequest
     */
	public function withEnableCampaignCode(?bool $enableCampaignCode): UpdateCampaignModelMasterRequest {
		$this->enableCampaignCode = $enableCampaignCode;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCampaignModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCampaignModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCampaignModelName(array_key_exists('campaignModelName', $data) && $data['campaignModelName'] !== null ? $data['campaignModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withEnableCampaignCode(array_key_exists('enableCampaignCode', $data) ? $data['enableCampaignCode'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "campaignModelName" => $this->getCampaignModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "enableCampaignCode" => $this->getEnableCampaignCode(),
        );
    }
}