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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\Mold;
use Gs2\Formation\Model\SlotModel;
use Gs2\Formation\Model\FormModel;
use Gs2\Formation\Model\MoldModel;

class SetCapacityByStampSheetResult implements IResult {
    /** @var Mold */
    private $item;
    /** @var MoldModel */
    private $moldModel;

	public function getItem(): ?Mold {
		return $this->item;
	}

	public function setItem(?Mold $item) {
		$this->item = $item;
	}

	public function withItem(?Mold $item): SetCapacityByStampSheetResult {
		$this->item = $item;
		return $this;
	}

	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

	public function withMoldModel(?MoldModel $moldModel): SetCapacityByStampSheetResult {
		$this->moldModel = $moldModel;
		return $this;
	}

    public static function fromJson(?array $data): ?SetCapacityByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new SetCapacityByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Mold::fromJson($data['item']) : null)
            ->withMoldModel(array_key_exists('moldModel', $data) && $data['moldModel'] !== null ? MoldModel::fromJson($data['moldModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "moldModel" => $this->getMoldModel() !== null ? $this->getMoldModel()->toJson() : null,
        );
    }
}