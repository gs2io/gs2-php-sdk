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


class RateModel implements IModel {
	/**
     * @var string
	 */
	private $rateModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $consumeActions;
	/**
     * @var string
	 */
	private $timingType;
	/**
     * @var int
	 */
	private $lockTime;
	/**
     * @var bool
	 */
	private $enableSkip;
	/**
     * @var array
	 */
	private $skipConsumeActions;
	/**
     * @var array
	 */
	private $acquireActions;

	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}

	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}

	public function withRateModelId(?string $rateModelId): RateModel {
		$this->rateModelId = $rateModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): RateModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): RateModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	public function withConsumeActions(?array $consumeActions): RateModel {
		$this->consumeActions = $consumeActions;
		return $this;
	}

	public function getTimingType(): ?string {
		return $this->timingType;
	}

	public function setTimingType(?string $timingType) {
		$this->timingType = $timingType;
	}

	public function withTimingType(?string $timingType): RateModel {
		$this->timingType = $timingType;
		return $this;
	}

	public function getLockTime(): ?int {
		return $this->lockTime;
	}

	public function setLockTime(?int $lockTime) {
		$this->lockTime = $lockTime;
	}

	public function withLockTime(?int $lockTime): RateModel {
		$this->lockTime = $lockTime;
		return $this;
	}

	public function getEnableSkip(): ?bool {
		return $this->enableSkip;
	}

	public function setEnableSkip(?bool $enableSkip) {
		$this->enableSkip = $enableSkip;
	}

	public function withEnableSkip(?bool $enableSkip): RateModel {
		$this->enableSkip = $enableSkip;
		return $this;
	}

	public function getSkipConsumeActions(): ?array {
		return $this->skipConsumeActions;
	}

	public function setSkipConsumeActions(?array $skipConsumeActions) {
		$this->skipConsumeActions = $skipConsumeActions;
	}

	public function withSkipConsumeActions(?array $skipConsumeActions): RateModel {
		$this->skipConsumeActions = $skipConsumeActions;
		return $this;
	}

	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	public function withAcquireActions(?array $acquireActions): RateModel {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public static function fromJson(?array $data): ?RateModel {
        if ($data === null) {
            return null;
        }
        return (new RateModel())
            ->withRateModelId(array_key_exists('rateModelId', $data) && $data['rateModelId'] !== null ? $data['rateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('consumeActions', $data) && $data['consumeActions'] !== null ? $data['consumeActions'] : []
            ))
            ->withTimingType(array_key_exists('timingType', $data) && $data['timingType'] !== null ? $data['timingType'] : null)
            ->withLockTime(array_key_exists('lockTime', $data) && $data['lockTime'] !== null ? $data['lockTime'] : null)
            ->withEnableSkip($data['enableSkip'])
            ->withSkipConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('skipConsumeActions', $data) && $data['skipConsumeActions'] !== null ? $data['skipConsumeActions'] : []
            ))
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "rateModelId" => $this->getRateModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "consumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions() !== null && $this->getConsumeActions() !== null ? $this->getConsumeActions() : []
            ),
            "timingType" => $this->getTimingType(),
            "lockTime" => $this->getLockTime(),
            "enableSkip" => $this->getEnableSkip(),
            "skipConsumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSkipConsumeActions() !== null && $this->getSkipConsumeActions() !== null ? $this->getSkipConsumeActions() : []
            ),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
        );
    }
}