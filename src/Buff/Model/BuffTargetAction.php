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


/**
 * Buff Target Action
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#bufftargetaction
 */
class BuffTargetAction implements IModel {
	/**
     * @var string Action type to apply buffs
	 */
	private $targetActionName;
	/**
     * @var string Field name to which the buff is applied
	 */
	private $targetFieldName;
	/**
     * @var array List of buff application condition GRNs
	 */
	private $conditionGrns;
	/**
     * @var float Adjustment rate
	 */
	private $rate;
    /** @return string|null Action type to apply buffs */
	public function getTargetActionName(): ?string {
		return $this->targetActionName;
	}
    /** @param string|null $targetActionName Action type to apply buffs */
	public function setTargetActionName(?string $targetActionName) {
		$this->targetActionName = $targetActionName;
	}
    /**
     * @param string|null $targetActionName Action type to apply buffs
     * @return BuffTargetAction
     */
	public function withTargetActionName(?string $targetActionName): BuffTargetAction {
		$this->targetActionName = $targetActionName;
		return $this;
	}
    /** @return string|null Field name to which the buff is applied */
	public function getTargetFieldName(): ?string {
		return $this->targetFieldName;
	}
    /** @param string|null $targetFieldName Field name to which the buff is applied */
	public function setTargetFieldName(?string $targetFieldName) {
		$this->targetFieldName = $targetFieldName;
	}
    /**
     * @param string|null $targetFieldName Field name to which the buff is applied
     * @return BuffTargetAction
     */
	public function withTargetFieldName(?string $targetFieldName): BuffTargetAction {
		$this->targetFieldName = $targetFieldName;
		return $this;
	}
    /** @return array|null List of buff application condition GRNs */
	public function getConditionGrns(): ?array {
		return $this->conditionGrns;
	}
    /** @param array|null $conditionGrns List of buff application condition GRNs */
	public function setConditionGrns(?array $conditionGrns) {
		$this->conditionGrns = $conditionGrns;
	}
    /**
     * @param array|null $conditionGrns List of buff application condition GRNs
     * @return BuffTargetAction
     */
	public function withConditionGrns(?array $conditionGrns): BuffTargetAction {
		$this->conditionGrns = $conditionGrns;
		return $this;
	}
    /** @return float|null Adjustment rate */
	public function getRate(): ?float {
		return $this->rate;
	}
    /** @param float|null $rate Adjustment rate */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
    /**
     * @param float|null $rate Adjustment rate
     * @return BuffTargetAction
     */
	public function withRate(?float $rate): BuffTargetAction {
		$this->rate = $rate;
		return $this;
	}

    public static function fromJson(?array $data): ?BuffTargetAction {
        if ($data === null) {
            return null;
        }
        return (new BuffTargetAction())
            ->withTargetActionName(array_key_exists('targetActionName', $data) && $data['targetActionName'] !== null ? $data['targetActionName'] : null)
            ->withTargetFieldName(array_key_exists('targetFieldName', $data) && $data['targetFieldName'] !== null ? $data['targetFieldName'] : null)
            ->withConditionGrns(!array_key_exists('conditionGrns', $data) || $data['conditionGrns'] === null ? null : array_map(
                function ($item) {
                    return BuffTargetGrn::fromJson($item);
                },
                $data['conditionGrns']
            ))
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null);
    }

    public function toJson(): array {
        return array(
            "targetActionName" => $this->getTargetActionName(),
            "targetFieldName" => $this->getTargetFieldName(),
            "conditionGrns" => $this->getConditionGrns() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConditionGrns()
            ),
            "rate" => $this->getRate(),
        );
    }
}