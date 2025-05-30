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
	private $verifyActions;
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
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
	public function withVerifyActions(?array $verifyActions): RateModel {
		$this->verifyActions = $verifyActions;
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
            ->withVerifyActions(!array_key_exists('verifyActions', $data) || $data['verifyActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['verifyActions']
            ))
            ->withConsumeActions(!array_key_exists('consumeActions', $data) || $data['consumeActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['consumeActions']
            ))
            ->withTimingType(array_key_exists('timingType', $data) && $data['timingType'] !== null ? $data['timingType'] : null)
            ->withLockTime(array_key_exists('lockTime', $data) && $data['lockTime'] !== null ? $data['lockTime'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ));
    }

    public function toJson(): array {
        return array(
            "rateModelId" => $this->getRateModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "verifyActions" => $this->getVerifyActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions()
            ),
            "consumeActions" => $this->getConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions()
            ),
            "timingType" => $this->getTimingType(),
            "lockTime" => $this->getLockTime(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
        );
    }
}