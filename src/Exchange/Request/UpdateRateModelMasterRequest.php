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
use Gs2\Exchange\Model\ConsumeAction;
use Gs2\Exchange\Model\AcquireAction;

class UpdateRateModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rateName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $timingType;
    /** @var int */
    private $lockTime;
    /** @var bool */
    private $enableSkip;
    /** @var array */
    private $skipConsumeActions;
    /** @var array */
    private $acquireActions;
    /** @var array */
    private $consumeActions;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRateName(): ?string {
		return $this->rateName;
	}

	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	public function withRateName(?string $rateName): UpdateRateModelMasterRequest {
		$this->rateName = $rateName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateRateModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateRateModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getTimingType(): ?string {
		return $this->timingType;
	}

	public function setTimingType(?string $timingType) {
		$this->timingType = $timingType;
	}

	public function withTimingType(?string $timingType): UpdateRateModelMasterRequest {
		$this->timingType = $timingType;
		return $this;
	}

	public function getLockTime(): ?int {
		return $this->lockTime;
	}

	public function setLockTime(?int $lockTime) {
		$this->lockTime = $lockTime;
	}

	public function withLockTime(?int $lockTime): UpdateRateModelMasterRequest {
		$this->lockTime = $lockTime;
		return $this;
	}

	public function getEnableSkip(): ?bool {
		return $this->enableSkip;
	}

	public function setEnableSkip(?bool $enableSkip) {
		$this->enableSkip = $enableSkip;
	}

	public function withEnableSkip(?bool $enableSkip): UpdateRateModelMasterRequest {
		$this->enableSkip = $enableSkip;
		return $this;
	}

	public function getSkipConsumeActions(): ?array {
		return $this->skipConsumeActions;
	}

	public function setSkipConsumeActions(?array $skipConsumeActions) {
		$this->skipConsumeActions = $skipConsumeActions;
	}

	public function withSkipConsumeActions(?array $skipConsumeActions): UpdateRateModelMasterRequest {
		$this->skipConsumeActions = $skipConsumeActions;
		return $this;
	}

	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	public function withAcquireActions(?array $acquireActions): UpdateRateModelMasterRequest {
		$this->acquireActions = $acquireActions;
		return $this;
	}

	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	public function withConsumeActions(?array $consumeActions): UpdateRateModelMasterRequest {
		$this->consumeActions = $consumeActions;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRateModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRateName(empty($data['rateName']) ? null : $data['rateName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withTimingType(empty($data['timingType']) ? null : $data['timingType'])
            ->withLockTime(empty($data['lockTime']) ? null : $data['lockTime'])
            ->withEnableSkip(empty($data['enableSkip']) ? null : $data['enableSkip'])
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
            ))
            ->withConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('consumeActions', $data) && $data['consumeActions'] !== null ? $data['consumeActions'] : []
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
            "consumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions() !== null && $this->getConsumeActions() !== null ? $this->getConsumeActions() : []
            ),
        );
    }
}