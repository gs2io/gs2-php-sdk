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

/**
 * Result of setMoldCapacityByUserId: Set capacity size with specified user ID
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#setmoldcapacitybyuserid
 */
class SetMoldCapacityByUserIdResult implements IResult {
    /** @var Mold Form Storage Area with updated capacity */
    private $item;
    /** @var Mold Form Storage Area before updating capacity */
    private $old;
    /** @var MoldModel Form Storage Area */
    private $moldModel;

    /** @return Mold|null Form Storage Area with updated capacity */
	public function getItem(): ?Mold {
		return $this->item;
	}

    /** @param Mold|null $item Form Storage Area with updated capacity */
	public function setItem(?Mold $item) {
		$this->item = $item;
	}

    /**
     * @param Mold|null $item Form Storage Area with updated capacity
     * @return SetMoldCapacityByUserIdResult
     */
	public function withItem(?Mold $item): SetMoldCapacityByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return Mold|null Form Storage Area before updating capacity */
	public function getOld(): ?Mold {
		return $this->old;
	}

    /** @param Mold|null $old Form Storage Area before updating capacity */
	public function setOld(?Mold $old) {
		$this->old = $old;
	}

    /**
     * @param Mold|null $old Form Storage Area before updating capacity
     * @return SetMoldCapacityByUserIdResult
     */
	public function withOld(?Mold $old): SetMoldCapacityByUserIdResult {
		$this->old = $old;
		return $this;
	}

    /** @return MoldModel|null Form Storage Area */
	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

    /** @param MoldModel|null $moldModel Form Storage Area */
	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

    /**
     * @param MoldModel|null $moldModel Form Storage Area
     * @return SetMoldCapacityByUserIdResult
     */
	public function withMoldModel(?MoldModel $moldModel): SetMoldCapacityByUserIdResult {
		$this->moldModel = $moldModel;
		return $this;
	}

    public static function fromJson(?array $data): ?SetMoldCapacityByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SetMoldCapacityByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Mold::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? Mold::fromJson($data['old']) : null)
            ->withMoldModel(array_key_exists('moldModel', $data) && $data['moldModel'] !== null ? MoldModel::fromJson($data['moldModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
            "moldModel" => $this->getMoldModel() !== null ? $this->getMoldModel()->toJson() : null,
        );
    }
}