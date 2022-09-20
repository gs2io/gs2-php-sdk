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


class CampaignModel implements IModel {
	/**
     * @var string
	 */
	private $campaignId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var bool
	 */
	private $enableCampaignCode;
	public function getCampaignId(): ?string {
		return $this->campaignId;
	}
	public function setCampaignId(?string $campaignId) {
		$this->campaignId = $campaignId;
	}
	public function withCampaignId(?string $campaignId): CampaignModel {
		$this->campaignId = $campaignId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CampaignModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CampaignModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getEnableCampaignCode(): ?bool {
		return $this->enableCampaignCode;
	}
	public function setEnableCampaignCode(?bool $enableCampaignCode) {
		$this->enableCampaignCode = $enableCampaignCode;
	}
	public function withEnableCampaignCode(?bool $enableCampaignCode): CampaignModel {
		$this->enableCampaignCode = $enableCampaignCode;
		return $this;
	}

    public static function fromJson(?array $data): ?CampaignModel {
        if ($data === null) {
            return null;
        }
        return (new CampaignModel())
            ->withCampaignId(array_key_exists('campaignId', $data) && $data['campaignId'] !== null ? $data['campaignId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withEnableCampaignCode(array_key_exists('enableCampaignCode', $data) ? $data['enableCampaignCode'] : null);
    }

    public function toJson(): array {
        return array(
            "campaignId" => $this->getCampaignId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "enableCampaignCode" => $this->getEnableCampaignCode(),
        );
    }
}