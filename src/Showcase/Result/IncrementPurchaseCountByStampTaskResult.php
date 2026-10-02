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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\RandomDisplayItem;

/**
 * Result of incrementPurchaseCountByStampTask: Execute the addition of the number of purchases as a consume action
 *
 * @see https://docs.gs2.io/api_reference/showcase/stamp_sheet/#gs2showcaseincrementpurchasecountbyuserid
 */
class IncrementPurchaseCountByStampTaskResult implements IResult {
    /** @var RandomDisplayItem Random Displayed Items after purchase counts are added */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return RandomDisplayItem|null Random Displayed Items after purchase counts are added */
	public function getItem(): ?RandomDisplayItem {
		return $this->item;
	}

    /** @param RandomDisplayItem|null $item Random Displayed Items after purchase counts are added */
	public function setItem(?RandomDisplayItem $item) {
		$this->item = $item;
	}

    /**
     * @param RandomDisplayItem|null $item Random Displayed Items after purchase counts are added
     * @return IncrementPurchaseCountByStampTaskResult
     */
	public function withItem(?RandomDisplayItem $item): IncrementPurchaseCountByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return IncrementPurchaseCountByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): IncrementPurchaseCountByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?IncrementPurchaseCountByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new IncrementPurchaseCountByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RandomDisplayItem::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}