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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\AcquireAction;
use Gs2\Exchange\Model\VerifyAction;
use Gs2\Exchange\Model\ConsumeAction;

/**
 * Request for updateRateModelMaster: Update Exchange Rate Model Master
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#updateratemodelmaster
 */
class UpdateRateModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Exchange Rate Model name */
    private $rateName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Type of exchange */
    private $timingType;
    /** @var int Waiting time (minutes) from the execution of the exchange until the reward is actually received */
    private $lockTime;
    /** @var array List of Acquire Actions */
    private $acquireActions;
    /** @var array List of Verify Actions */
    private $verifyActions;
    /** @var array List of Consume Actions */
    private $consumeActions;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateRateModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Exchange Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Exchange Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Exchange Rate Model name
     * @return UpdateRateModelMasterRequest
     */
	public function withRateName(?string $rateName): UpdateRateModelMasterRequest {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateRateModelMasterRequest
     */
	public function withDescription(?string $description): UpdateRateModelMasterRequest {
		$this->description = $description;
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
     * @return UpdateRateModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateRateModelMasterRequest {
		$this->metadata = $metadata;
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
     * @return UpdateRateModelMasterRequest
     */
	public function withTimingType(?string $timingType): UpdateRateModelMasterRequest {
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
     * @return UpdateRateModelMasterRequest
     */
	public function withLockTime(?int $lockTime): UpdateRateModelMasterRequest {
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
     * @return UpdateRateModelMasterRequest
     */
	public function withAcquireActions(?array $acquireActions): UpdateRateModelMasterRequest {
		$this->acquireActions = $acquireActions;
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
     * @return UpdateRateModelMasterRequest
     */
	public function withVerifyActions(?array $verifyActions): UpdateRateModelMasterRequest {
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
     * @return UpdateRateModelMasterRequest
     */
	public function withConsumeActions(?array $consumeActions): UpdateRateModelMasterRequest {
		$this->consumeActions = $consumeActions;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRateModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTimingType(array_key_exists('timingType', $data) && $data['timingType'] !== null ? $data['timingType'] : null)
            ->withLockTime(array_key_exists('lockTime', $data) && $data['lockTime'] !== null ? $data['lockTime'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ))
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
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "timingType" => $this->getTimingType(),
            "lockTime" => $this->getLockTime(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
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
        );
    }
}