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

namespace Gs2\Buff\Result;

use Gs2\Core\Model\IResult;
use Gs2\Buff\Model\BuffTargetGrn;
use Gs2\Buff\Model\BuffTargetModel;
use Gs2\Buff\Model\BuffTargetAction;
use Gs2\Buff\Model\BuffEntryModel;

/**
 * Result of applyBuffByUserId: Apply buff by User ID
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#applybuffbyuserid
 */
class ApplyBuffByUserIdResult implements IResult {
    /** @var array List of applied buffs */
    private $items;
    /** @var string Context stack after applying buff */
    private $newContextStack;

    /** @return array|null List of applied buffs */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of applied buffs */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of applied buffs
     * @return ApplyBuffByUserIdResult
     */
	public function withItems(?array $items): ApplyBuffByUserIdResult {
		$this->items = $items;
		return $this;
	}

    /** @return string|null Context stack after applying buff */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context stack after applying buff */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context stack after applying buff
     * @return ApplyBuffByUserIdResult
     */
	public function withNewContextStack(?string $newContextStack): ApplyBuffByUserIdResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?ApplyBuffByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ApplyBuffByUserIdResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return BuffEntryModel::fromJson($item);
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