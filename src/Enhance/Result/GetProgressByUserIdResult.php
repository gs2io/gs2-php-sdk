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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\Progress;
use Gs2\Enhance\Model\BonusRate;
use Gs2\Enhance\Model\RateModel;

class GetProgressByUserIdResult implements IResult {
    /** @var Progress */
    private $item;
    /** @var RateModel */
    private $rateModel;

	public function getItem(): ?Progress {
		return $this->item;
	}

	public function setItem(?Progress $item) {
		$this->item = $item;
	}

	public function withItem(?Progress $item): GetProgressByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getRateModel(): ?RateModel {
		return $this->rateModel;
	}

	public function setRateModel(?RateModel $rateModel) {
		$this->rateModel = $rateModel;
	}

	public function withRateModel(?RateModel $rateModel): GetProgressByUserIdResult {
		$this->rateModel = $rateModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProgressByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetProgressByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Progress::fromJson($data['item']) : null)
            ->withRateModel(array_key_exists('rateModel', $data) && $data['rateModel'] !== null ? RateModel::fromJson($data['rateModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "rateModel" => $this->getRateModel() !== null ? $this->getRateModel()->toJson() : null,
        );
    }
}