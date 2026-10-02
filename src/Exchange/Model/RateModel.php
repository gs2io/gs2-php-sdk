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
 * Exchange Rate Model
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#ratemodel
 */
class RateModel implements IModel {
	/**
     * @var string Exchange Rate Model GRN
	 */
	private $rateModelId;
	/**
     * @var string Exchange Rate Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Verify Actions
	 */
	private $verifyActions;
	/**
     * @var array List of Consume Actions
	 */
	private $consumeActions;
	/**
     * @var string Type of exchange
	 */
	private $timingType;
	/**
     * @var int Waiting time (minutes) from the execution of the exchange until the reward is actually received
	 */
	private $lockTime;
	/**
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
    /** @return string|null Exchange Rate Model GRN */
	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}
    /** @param string|null $rateModelId Exchange Rate Model GRN */
	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}
    /**
     * @param string|null $rateModelId Exchange Rate Model GRN
     * @return RateModel
     */
	public function withRateModelId(?string $rateModelId): RateModel {
		$this->rateModelId = $rateModelId;
		return $this;
	}
    /** @return string|null Exchange Rate Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Exchange Rate Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Exchange Rate Model name
     * @return RateModel
     */
	public function withName(?string $name): RateModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return RateModel
     */
	public function withMetadata(?string $metadata): RateModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Verify Actions */
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
    /** @param array|null $verifyActions List of Verify Actions */
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
    /**
     * @param array|null $verifyActions List of Verify Actions
     * @return RateModel
     */
	public function withVerifyActions(?array $verifyActions): RateModel {
		$this->verifyActions = $verifyActions;
		return $this;
	}
    /** @return array|null List of Consume Actions */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
    /** @param array|null $consumeActions List of Consume Actions */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
    /**
     * @param array|null $consumeActions List of Consume Actions
     * @return RateModel
     */
	public function withConsumeActions(?array $consumeActions): RateModel {
		$this->consumeActions = $consumeActions;
		return $this;
	}
    /** @return string|null Type of exchange */
	public function getTimingType(): ?string {
		return $this->timingType;
	}
    /** @param string|null $timingType Type of exchange */
	public function setTimingType(?string $timingType) {
		$this->timingType = $timingType;
	}
    /**
     * @param string|null $timingType Type of exchange
     * @return RateModel
     */
	public function withTimingType(?string $timingType): RateModel {
		$this->timingType = $timingType;
		return $this;
	}
    /** @return int|null Waiting time (minutes) from the execution of the exchange until the reward is actually received */
	public function getLockTime(): ?int {
		return $this->lockTime;
	}
    /** @param int|null $lockTime Waiting time (minutes) from the execution of the exchange until the reward is actually received */
	public function setLockTime(?int $lockTime) {
		$this->lockTime = $lockTime;
	}
    /**
     * @param int|null $lockTime Waiting time (minutes) from the execution of the exchange until the reward is actually received
     * @return RateModel
     */
	public function withLockTime(?int $lockTime): RateModel {
		$this->lockTime = $lockTime;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return RateModel
     */
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