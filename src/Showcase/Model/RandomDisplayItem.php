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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;


class RandomDisplayItem implements IModel {
	/**
     * @var string
	 */
	private $showcaseName;
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
     * @var array
	 */
	private $acquireActions;
	/**
     * @var int
	 */
	private $currentPurchaseCount;
	/**
     * @var int
	 */
	private $maximumPurchaseCount;
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
	public function withShowcaseName(?string $showcaseName): RandomDisplayItem {
		$this->showcaseName = $showcaseName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RandomDisplayItem {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RandomDisplayItem {
		$this->metadata = $metadata;
		return $this;
	}
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
	public function withConsumeActions(?array $consumeActions): RandomDisplayItem {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
	public function withAcquireActions(?array $acquireActions): RandomDisplayItem {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	public function getCurrentPurchaseCount(): ?int {
		return $this->currentPurchaseCount;
	}
	public function setCurrentPurchaseCount(?int $currentPurchaseCount) {
		$this->currentPurchaseCount = $currentPurchaseCount;
	}
	public function withCurrentPurchaseCount(?int $currentPurchaseCount): RandomDisplayItem {
		$this->currentPurchaseCount = $currentPurchaseCount;
		return $this;
	}
	public function getMaximumPurchaseCount(): ?int {
		return $this->maximumPurchaseCount;
	}
	public function setMaximumPurchaseCount(?int $maximumPurchaseCount) {
		$this->maximumPurchaseCount = $maximumPurchaseCount;
	}
	public function withMaximumPurchaseCount(?int $maximumPurchaseCount): RandomDisplayItem {
		$this->maximumPurchaseCount = $maximumPurchaseCount;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomDisplayItem {
        if ($data === null) {
            return null;
        }
        return (new RandomDisplayItem())
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('consumeActions', $data) && $data['consumeActions'] !== null ? $data['consumeActions'] : []
            ))
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ))
            ->withCurrentPurchaseCount(array_key_exists('currentPurchaseCount', $data) && $data['currentPurchaseCount'] !== null ? $data['currentPurchaseCount'] : null)
            ->withMaximumPurchaseCount(array_key_exists('maximumPurchaseCount', $data) && $data['maximumPurchaseCount'] !== null ? $data['maximumPurchaseCount'] : null);
    }

    public function toJson(): array {
        return array(
            "showcaseName" => $this->getShowcaseName(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "consumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions() !== null && $this->getConsumeActions() !== null ? $this->getConsumeActions() : []
            ),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "currentPurchaseCount" => $this->getCurrentPurchaseCount(),
            "maximumPurchaseCount" => $this->getMaximumPurchaseCount(),
        );
    }
}