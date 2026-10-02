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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\BigItem;

/**
 * Result of verifyBigItemByStampTask: Execute verification of Big Item as verify action
 *
 * @see https://docs.gs2.io/api_reference/inventory/stamp_sheet/#gs2inventoryverifybigitembyuserid
 */
class VerifyBigItemByStampTaskResult implements IResult {
    /** @var BigItem Big Item after update */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

    /** @return BigItem|null Big Item after update */
	public function getItem(): ?BigItem {
		return $this->item;
	}

    /** @param BigItem|null $item Big Item after update */
	public function setItem(?BigItem $item) {
		$this->item = $item;
	}

    /**
     * @param BigItem|null $item Big Item after update
     * @return VerifyBigItemByStampTaskResult
     */
	public function withItem(?BigItem $item): VerifyBigItemByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of verification actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of verification actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of verification actions
     * @return VerifyBigItemByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyBigItemByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyBigItemByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyBigItemByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BigItem::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}