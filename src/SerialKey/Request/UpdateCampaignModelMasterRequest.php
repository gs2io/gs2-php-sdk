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

class UpdateCampaignModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $campaignModelName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var bool */
    private $enableCampaignCode;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateCampaignModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
	public function withCampaignModelName(?string $campaignModelName): UpdateCampaignModelMasterRequest {
		$this->campaignModelName = $campaignModelName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateCampaignModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateCampaignModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getEnableCampaignCode(): ?bool {
		return $this->enableCampaignCode;
	}
	public function setEnableCampaignCode(?bool $enableCampaignCode) {
		$this->enableCampaignCode = $enableCampaignCode;
	}
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