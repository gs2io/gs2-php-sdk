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

namespace Gs2\Buff\Model;

use Gs2\Core\Model\IModel;


class BuffTargetModel implements IModel {
	/**
     * @var string
	 */
	private $targetModelName;
	/**
     * @var string
	 */
	private $targetFieldName;
	/**
     * @var array
	 */
	private $conditionGrns;
	/**
     * @var float
	 */
	private $rate;
	public function getTargetModelName(): ?string {
		return $this->targetModelName;
	}
	public function setTargetModelName(?string $targetModelName) {
		$this->targetModelName = $targetModelName;
	}
	public function withTargetModelName(?string $targetModelName): BuffTargetModel {
		$this->targetModelName = $targetModelName;
		return $this;
	}
	public function getTargetFieldName(): ?string {
		return $this->targetFieldName;
	}
	public function setTargetFieldName(?string $targetFieldName) {
		$this->targetFieldName = $targetFieldName;
	}
	public function withTargetFieldName(?string $targetFieldName): BuffTargetModel {
		$this->targetFieldName = $targetFieldName;
		return $this;
	}
	public function getConditionGrns(): ?array {
		return $this->conditionGrns;
	}
	public function setConditionGrns(?array $conditionGrns) {
		$this->conditionGrns = $conditionGrns;
	}
	public function withConditionGrns(?array $conditionGrns): BuffTargetModel {
		$this->conditionGrns = $conditionGrns;
		return $this;
	}
	public function getRate(): ?float {
		return $this->rate;
	}
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
	public function withRate(?float $rate): BuffTargetModel {
		$this->rate = $rate;
		return $this;
	}

    public static function fromJson(?array $data): ?BuffTargetModel {
        if ($data === null) {
            return null;
        }
        return (new BuffTargetModel())
            ->withTargetModelName(array_key_exists('targetModelName', $data) && $data['targetModelName'] !== null ? $data['targetModelName'] : null)
            ->withTargetFieldName(array_key_exists('targetFieldName', $data) && $data['targetFieldName'] !== null ? $data['targetFieldName'] : null)
            ->withConditionGrns(array_map(
                function ($item) {
                    return BuffTargetGrn::fromJson($item);
                },
                array_key_exists('conditionGrns', $data) && $data['conditionGrns'] !== null ? $data['conditionGrns'] : []
            ))
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null);
    }

    public function toJson(): array {
        return array(
            "targetModelName" => $this->getTargetModelName(),
            "targetFieldName" => $this->getTargetFieldName(),
            "conditionGrns" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConditionGrns() !== null && $this->getConditionGrns() !== null ? $this->getConditionGrns() : []
            ),
            "rate" => $this->getRate(),
        );
    }
}