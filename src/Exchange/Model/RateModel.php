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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;

/**
 * 交換レートモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class RateModel implements IModel {
	/**
     * @var string 交換レートマスター
	 */
	protected $rateModelId;

	/**
	 * 交換レートマスターを取得
	 *
	 * @return string|null 交換レートマスター
	 */
	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}

	/**
	 * 交換レートマスターを設定
	 *
	 * @param string|null $rateModelId 交換レートマスター
	 */
	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}

	/**
	 * 交換レートマスターを設定
	 *
	 * @param string|null $rateModelId 交換レートマスター
	 * @return RateModel $this
	 */
	public function withRateModelId(?string $rateModelId): RateModel {
		$this->rateModelId = $rateModelId;
		return $this;
	}
	/**
     * @var string 交換レートの種類名
	 */
	protected $name;

	/**
	 * 交換レートの種類名を取得
	 *
	 * @return string|null 交換レートの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 交換レートの種類名を設定
	 *
	 * @param string|null $name 交換レートの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 交換レートの種類名を設定
	 *
	 * @param string|null $name 交換レートの種類名
	 * @return RateModel $this
	 */
	public function withName(?string $name): RateModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 交換レートの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * 交換レートの種類のメタデータを取得
	 *
	 * @return string|null 交換レートの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 交換レートの種類のメタデータを設定
	 *
	 * @param string|null $metadata 交換レートの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 交換レートの種類のメタデータを設定
	 *
	 * @param string|null $metadata 交換レートの種類のメタデータ
	 * @return RateModel $this
	 */
	public function withMetadata(?string $metadata): RateModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var ConsumeAction[] 消費アクションリスト
	 */
	protected $consumeActions;

	/**
	 * 消費アクションリストを取得
	 *
	 * @return ConsumeAction[]|null 消費アクションリスト
	 */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	/**
	 * 消費アクションリストを設定
	 *
	 * @param ConsumeAction[]|null $consumeActions 消費アクションリスト
	 */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	/**
	 * 消費アクションリストを設定
	 *
	 * @param ConsumeAction[]|null $consumeActions 消費アクションリスト
	 * @return RateModel $this
	 */
	public function withConsumeActions(?array $consumeActions): RateModel {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	/**
     * @var string 交換の種類
	 */
	protected $timingType;

	/**
	 * 交換の種類を取得
	 *
	 * @return string|null 交換の種類
	 */
	public function getTimingType(): ?string {
		return $this->timingType;
	}

	/**
	 * 交換の種類を設定
	 *
	 * @param string|null $timingType 交換の種類
	 */
	public function setTimingType(?string $timingType) {
		$this->timingType = $timingType;
	}

	/**
	 * 交換の種類を設定
	 *
	 * @param string|null $timingType 交換の種類
	 * @return RateModel $this
	 */
	public function withTimingType(?string $timingType): RateModel {
		$this->timingType = $timingType;
		return $this;
	}
	/**
     * @var int 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）
	 */
	protected $lockTime;

	/**
	 * 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）を取得
	 *
	 * @return int|null 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）
	 */
	public function getLockTime(): ?int {
		return $this->lockTime;
	}

	/**
	 * 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）を設定
	 *
	 * @param int|null $lockTime 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）
	 */
	public function setLockTime(?int $lockTime) {
		$this->lockTime = $lockTime;
	}

	/**
	 * 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）を設定
	 *
	 * @param int|null $lockTime 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）
	 * @return RateModel $this
	 */
	public function withLockTime(?int $lockTime): RateModel {
		$this->lockTime = $lockTime;
		return $this;
	}
	/**
     * @var bool スキップをすることができるか
	 */
	protected $enableSkip;

	/**
	 * スキップをすることができるかを取得
	 *
	 * @return bool|null スキップをすることができるか
	 */
	public function getEnableSkip(): ?bool {
		return $this->enableSkip;
	}

	/**
	 * スキップをすることができるかを設定
	 *
	 * @param bool|null $enableSkip スキップをすることができるか
	 */
	public function setEnableSkip(?bool $enableSkip) {
		$this->enableSkip = $enableSkip;
	}

	/**
	 * スキップをすることができるかを設定
	 *
	 * @param bool|null $enableSkip スキップをすることができるか
	 * @return RateModel $this
	 */
	public function withEnableSkip(?bool $enableSkip): RateModel {
		$this->enableSkip = $enableSkip;
		return $this;
	}
	/**
     * @var ConsumeAction[] 時短消費アクションリスト
	 */
	protected $skipConsumeActions;

	/**
	 * 時短消費アクションリストを取得
	 *
	 * @return ConsumeAction[]|null 時短消費アクションリスト
	 */
	public function getSkipConsumeActions(): ?array {
		return $this->skipConsumeActions;
	}

	/**
	 * 時短消費アクションリストを設定
	 *
	 * @param ConsumeAction[]|null $skipConsumeActions 時短消費アクションリスト
	 */
	public function setSkipConsumeActions(?array $skipConsumeActions) {
		$this->skipConsumeActions = $skipConsumeActions;
	}

	/**
	 * 時短消費アクションリストを設定
	 *
	 * @param ConsumeAction[]|null $skipConsumeActions 時短消費アクションリスト
	 * @return RateModel $this
	 */
	public function withSkipConsumeActions(?array $skipConsumeActions): RateModel {
		$this->skipConsumeActions = $skipConsumeActions;
		return $this;
	}
	/**
     * @var AcquireAction[] 入手アクションリスト
	 */
	protected $acquireActions;

	/**
	 * 入手アクションリストを取得
	 *
	 * @return AcquireAction[]|null 入手アクションリスト
	 */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	/**
	 * 入手アクションリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 入手アクションリスト
	 */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	/**
	 * 入手アクションリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 入手アクションリスト
	 * @return RateModel $this
	 */
	public function withAcquireActions(?array $acquireActions): RateModel {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public function toJson(): array {
        return array(
            "rateModelId" => $this->rateModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "consumeActions" => array_map(
                function (ConsumeAction $v) {
                    return $v->toJson();
                },
                $this->consumeActions == null ? [] : $this->consumeActions
            ),
            "timingType" => $this->timingType,
            "lockTime" => $this->lockTime,
            "enableSkip" => $this->enableSkip,
            "skipConsumeActions" => array_map(
                function (ConsumeAction $v) {
                    return $v->toJson();
                },
                $this->skipConsumeActions == null ? [] : $this->skipConsumeActions
            ),
            "acquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->acquireActions == null ? [] : $this->acquireActions
            ),
        );
    }

    public static function fromJson(array $data): RateModel {
        $model = new RateModel();
        $model->setRateModelId(isset($data["rateModelId"]) ? $data["rateModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setConsumeActions(array_map(
                function ($v) {
                    return ConsumeAction::fromJson($v);
                },
                isset($data["consumeActions"]) ? $data["consumeActions"] : []
            )
        );
        $model->setTimingType(isset($data["timingType"]) ? $data["timingType"] : null);
        $model->setLockTime(isset($data["lockTime"]) ? $data["lockTime"] : null);
        $model->setEnableSkip(isset($data["enableSkip"]) ? $data["enableSkip"] : null);
        $model->setSkipConsumeActions(array_map(
                function ($v) {
                    return ConsumeAction::fromJson($v);
                },
                isset($data["skipConsumeActions"]) ? $data["skipConsumeActions"] : []
            )
        );
        $model->setAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["acquireActions"]) ? $data["acquireActions"] : []
            )
        );
        return $model;
    }
}