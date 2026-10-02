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
use Gs2\Inventory\Model\SimpleItem;

/**
 * Result of consumeSimpleItemsByStampTask: Execute the consumption of simple items as a consume action
 *
 * @see https://docs.gs2.io/api_reference/inventory/stamp_sheet/#gs2inventoryconsumesimpleitemsbyuserid
 */
class ConsumeSimpleItemsByStampTaskResult implements IResult {
    /** @var array List of Quantity of simple items held per post-consumption */
    private $items;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return array|null List of Quantity of simple items held per post-consumption */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Quantity of simple items held per post-consumption */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Quantity of simple items held per post-consumption
     * @return ConsumeSimpleItemsByStampTaskResult
     */
	public function withItems(?array $items): ConsumeSimpleItemsByStampTaskResult {
		$this->items = $items;
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
     * @return ConsumeSimpleItemsByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): ConsumeSimpleItemsByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeSimpleItemsByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new ConsumeSimpleItemsByStampTaskResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return SimpleItem::fromJson($item);
                },
                $data['items']
            ))
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}