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
 * Result of decreaseByStampTask: Execute counter subtraction as a consume action within a distributed transaction
 *
 * @see https://docs.gs2.io/api_reference/mission/stamp_sheet/#gs2missiondecreasecounterbyuserid
 */
class DecreaseByStampTaskResult implements IResult {
    /** @var Counter Counter after counter addition */
    private $item;
    /** @var array List of updated Completion Statuses */
    private $changedCompletes;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Counter|null Counter after counter addition */
	public function getItem(): ?Counter {
		return $this->item;
	}

    /** @param Counter|null $item Counter after counter addition */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

    /**
     * @param Counter|null $item Counter after counter addition
     * @return DecreaseByStampTaskResult
     */
	public function withItem(?Counter $item): DecreaseByStampTaskResult {
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
     * @return DecreaseByStampTaskResult
     */
	public function withChangedCompletes(?array $changedCompletes): DecreaseByStampTaskResult {
		$this->changedCompletes = $changedCompletes;
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
     * @return DecreaseByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): DecreaseByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new DecreaseByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Counter::fromJson($data['item']) : null)
            ->withChangedCompletes(!array_key_exists('changedCompletes', $data) || $data['changedCompletes'] === null ? null : array_map(
                function ($item) {
                    return Complete::fromJson($item);
                },
                $data['changedCompletes']
            ))
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
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
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}