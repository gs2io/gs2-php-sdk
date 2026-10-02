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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\ScopedValue;
use Gs2\Mission\Model\Counter;
use Gs2\Mission\Model\Complete;

/**
 * Result of decreaseCounter: Decrease counter
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#decreasecounter
 */
class DecreaseCounterResult implements IResult {
    /** @var Counter Counters decreased */
    private $item;
    /** @var array List of updated Completion Statuses */
    private $changedCompletes;

    /** @return Counter|null Counters decreased */
	public function getItem(): ?Counter {
		return $this->item;
	}

    /** @param Counter|null $item Counters decreased */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

    /**
     * @param Counter|null $item Counters decreased
     * @return DecreaseCounterResult
     */
	public function withItem(?Counter $item): DecreaseCounterResult {
		$this->item = $item;
		return $this;
	}

    /** @return array|null List of updated Completion Statuses */
	public function getChangedCompletes(): ?array {
		return $this->changedCompletes;
	}

    /** @param array|null $changedCompletes List of updated Completion Statuses */
	public function setChangedCompletes(?array $changedCompletes) {
		$this->changedCompletes = $changedCompletes;
	}

    /**
     * @param array|null $changedCompletes List of updated Completion Statuses
     * @return DecreaseCounterResult
     */
	public function withChangedCompletes(?array $changedCompletes): DecreaseCounterResult {
		$this->changedCompletes = $changedCompletes;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseCounterResult {
        if ($data === null) {
            return null;
        }
        return (new DecreaseCounterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Counter::fromJson($data['item']) : null)
            ->withChangedCompletes(!array_key_exists('changedCompletes', $data) || $data['changedCompletes'] === null ? null : array_map(
                function ($item) {
                    return Complete::fromJson($item);
                },
                $data['changedCompletes']
            ));
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "changedCompletes" => $this->getChangedCompletes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getChangedCompletes()
            ),
        );
    }
}