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

class SubCapacityByStampTaskResult implements IResult {
    /** @var Mold */
    private $item;
    /** @var MoldModel */
    private $moldModel;
    /** @var string */
    private $newContextStack;

	public function getItem(): ?Mold {
		return $this->item;
	}

	public function setItem(?Mold $item) {
		$this->item = $item;
	}

	public function withItem(?Mold $item): SubCapacityByStampTaskResult {
		$this->item = $item;
		return $this;
	}

	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

	public function withMoldModel(?MoldModel $moldModel): SubCapacityByStampTaskResult {
		$this->moldModel = $moldModel;
		return $this;
	}

	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

	public function withNewContextStack(?string $newContextStack): SubCapacityByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?SubCapacityByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new SubCapacityByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Mold::fromJson($data['item']) : null)
            ->withMoldModel(array_key_exists('moldModel', $data) && $data['moldModel'] !== null ? MoldModel::fromJson($data['moldModel']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "moldModel" => $this->getMoldModel() !== null ? $this->getMoldModel()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}