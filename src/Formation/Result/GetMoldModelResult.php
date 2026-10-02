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
use Gs2\Formation\Model\SlotModel;
use Gs2\Formation\Model\FormModel;
use Gs2\Formation\Model\MoldModel;

/**
 * Result of getMoldModel: Get Form Storage Area Model
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldmodel
 */
class GetMoldModelResult implements IResult {
    /** @var MoldModel Form Storage Area */
    private $item;

    /** @return MoldModel|null Form Storage Area */
	public function getItem(): ?MoldModel {
		return $this->item;
	}

    /** @param MoldModel|null $item Form Storage Area */
	public function setItem(?MoldModel $item) {
		$this->item = $item;
	}

    /**
     * @param MoldModel|null $item Form Storage Area
     * @return GetMoldModelResult
     */
	public function withItem(?MoldModel $item): GetMoldModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetMoldModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetMoldModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? MoldModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}