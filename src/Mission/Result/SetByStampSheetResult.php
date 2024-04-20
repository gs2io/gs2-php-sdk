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

class SetByStampSheetResult implements IResult {
    /** @var Counter */
    private $item;
    /** @var Counter */
    private $old;
    /** @var array */
    private $changedCompletes;

	public function getItem(): ?Counter {
		return $this->item;
	}

	public function setItem(?Counter $item) {
		$this->item = $item;
	}

	public function withItem(?Counter $item): SetByStampSheetResult {
		$this->item = $item;
		return $this;
	}

	public function getOld(): ?Counter {
		return $this->old;
	}

	public function setOld(?Counter $old) {
		$this->old = $old;
	}

	public function withOld(?Counter $old): SetByStampSheetResult {
		$this->old = $old;
		return $this;
	}

	public function getChangedCompletes(): ?array {
		return $this->changedCompletes;
	}

	public function setChangedCompletes(?array $changedCompletes) {
		$this->changedCompletes = $changedCompletes;
	}

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
            ->withChangedCompletes(array_map(
                function ($item) {
                    return Complete::fromJson($item);
                },
                array_key_exists('changedCompletes', $data) && $data['changedCompletes'] !== null ? $data['changedCompletes'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
            "changedCompletes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getChangedCompletes() !== null && $this->getChangedCompletes() !== null ? $this->getChangedCompletes() : []
            ),
        );
    }
}