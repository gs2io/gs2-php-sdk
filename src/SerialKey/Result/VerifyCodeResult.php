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

namespace Gs2\SerialKey\Result;

use Gs2\Core\Model\IResult;
use Gs2\SerialKey\Model\SerialKey;
use Gs2\SerialKey\Model\CampaignModel;

/**
 * Result of verifyCode: Verify the validity of the serial code
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#verifycode
 */
class VerifyCodeResult implements IResult {
    /** @var SerialKey Serial Code */
    private $item;
    /** @var CampaignModel Campaign Model */
    private $campaignModel;

    /** @return SerialKey|null Serial Code */
	public function getItem(): ?SerialKey {
		return $this->item;
	}

    /** @param SerialKey|null $item Serial Code */
	public function setItem(?SerialKey $item) {
		$this->item = $item;
	}

    /**
     * @param SerialKey|null $item Serial Code
     * @return VerifyCodeResult
     */
	public function withItem(?SerialKey $item): VerifyCodeResult {
		$this->item = $item;
		return $this;
	}

    /** @return CampaignModel|null Campaign Model */
	public function getCampaignModel(): ?CampaignModel {
		return $this->campaignModel;
	}

    /** @param CampaignModel|null $campaignModel Campaign Model */
	public function setCampaignModel(?CampaignModel $campaignModel) {
		$this->campaignModel = $campaignModel;
	}

    /**
     * @param CampaignModel|null $campaignModel Campaign Model
     * @return VerifyCodeResult
     */
	public function withCampaignModel(?CampaignModel $campaignModel): VerifyCodeResult {
		$this->campaignModel = $campaignModel;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCodeResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyCodeResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SerialKey::fromJson($data['item']) : null)
            ->withCampaignModel(array_key_exists('campaignModel', $data) && $data['campaignModel'] !== null ? CampaignModel::fromJson($data['campaignModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "campaignModel" => $this->getCampaignModel() !== null ? $this->getCampaignModel()->toJson() : null,
        );
    }
}