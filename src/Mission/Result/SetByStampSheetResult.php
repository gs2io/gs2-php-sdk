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
 * Result of setByStampSheet: Execute counter setting any values as an acquire action within a distributed transaction
 *
 * @see https://docs.gs2.io/api_reference/mission/stamp_sheet/#gs2missionsetcounterbyuserid
 */
class SetByStampSheetResult implements IResult {
    /** @var Counter Counter after counter addition */
    private $item;
    /** @var Counter Counter after counter addition */
    private $old;
    /** @var array List of updated Completion Status */
    private $changedCompletes;

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
     * @return SetByStampSheetResult
     */
	public function withItem(?Counter $item): SetByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    /** @return Counter|null Counter after counter addition */
	public function getOld(): ?Counter {
		return $this->old;
	}

    /** @param Counter|null $old Counter after counter addition */
	public function setOld(?Counter $old) {
		$this->old = $old;
	}

    /**
     * @param Counter|null $old Counter after counter addition
     * @return SetByStampSheetResult
     */
	public function withOld(?Counter $old): SetByStampSheetResult {
		$this->old = $old;
		return $this;
	}

    /** @return array|null List of updated Completion Status */
	public function getChangedCompletes(): ?array {
		return $this->changedCompletes;
	}

    /** @param array|null $changedCompletes List of updated Completion Status */
	public function setChangedCompletes(?array $changedCompletes) {
		$this->changedCompletes = $changedCompletes;
	}

    /**
     * @param array|null $changedCompletes List of updated Completion Status
     * @return SetByStampSheetResult
     */
	public function withChangedCompletes(?array $changedCompletes): SetByStampSheetResult {
		$this->changedCompletes = $changedCompletes;
		return $this;
	}

    public static function fromJson(?array $data): ?SetByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new SetByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Counter::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? Counter::fromJson($data['old']) : null)
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
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
            "changedCompletes" => $this->getChangedCompletes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getChangedCompletes()
            ),
        );
    }
}