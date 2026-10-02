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


/**
 * Random Displayed Item on the Random Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#randomdisplayitem
 */
class RandomDisplayItem implements IModel {
	/**
     * @var string Random Showcase name
	 */
	private $showcaseName;
	/**
     * @var string Random Displayed Item name
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
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
	/**
     * @var int Current purchase count
	 */
	private $currentPurchaseCount;
	/**
     * @var int Maximum purchase count
	 */
	private $maximumPurchaseCount;
    /** @return string|null Random Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Random Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Random Showcase name
     * @return RandomDisplayItem
     */
	public function withShowcaseName(?string $showcaseName): RandomDisplayItem {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null Random Displayed Item name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Random Displayed Item name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Random Displayed Item name
     * @return RandomDisplayItem
     */
	public function withName(?string $name): RandomDisplayItem {
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
     * @return RandomDisplayItem
     */
	public function withMetadata(?string $metadata): RandomDisplayItem {
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
     * @return RandomDisplayItem
     */
	public function withVerifyActions(?array $verifyActions): RandomDisplayItem {
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
     * @return RandomDisplayItem
     */
	public function withConsumeActions(?array $consumeActions): RandomDisplayItem {
		$this->consumeActions = $consumeActions;
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
     * @return RandomDisplayItem
     */
	public function withAcquireActions(?array $acquireActions): RandomDisplayItem {
		$this->acquireActions = $acquireActions;
		return $this;
	}
    /** @return int|null Current purchase count */
	public function getCurrentPurchaseCount(): ?int {
		return $this->currentPurchaseCount;
	}
    /** @param int|null $currentPurchaseCount Current purchase count */
	public function setCurrentPurchaseCount(?int $currentPurchaseCount) {
		$this->currentPurchaseCount = $currentPurchaseCount;
	}
    /**
     * @param int|null $currentPurchaseCount Current purchase count
     * @return RandomDisplayItem
     */
	public function withCurrentPurchaseCount(?int $currentPurchaseCount): RandomDisplayItem {
		$this->currentPurchaseCount = $currentPurchaseCount;
		return $this;
	}
    /** @return int|null Maximum purchase count */
	public function getMaximumPurchaseCount(): ?int {
		return $this->maximumPurchaseCount;
	}
    /** @param int|null $maximumPurchaseCount Maximum purchase count */
	public function setMaximumPurchaseCount(?int $maximumPurchaseCount) {
		$this->maximumPurchaseCount = $maximumPurchaseCount;
	}
    /**
     * @param int|null $maximumPurchaseCount Maximum purchase count
     * @return RandomDisplayItem
     */
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
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ))
            ->withCurrentPurchaseCount(array_key_exists('currentPurchaseCount', $data) && $data['currentPurchaseCount'] !== null ? $data['currentPurchaseCount'] : null)
            ->withMaximumPurchaseCount(array_key_exists('maximumPurchaseCount', $data) && $data['maximumPurchaseCount'] !== null ? $data['maximumPurchaseCount'] : null);
    }

    public function toJson(): array {
        return array(
            "showcaseName" => $this->getShowcaseName(),
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
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
            "currentPurchaseCount" => $this->getCurrentPurchaseCount(),
            "maximumPurchaseCount" => $this->getMaximumPurchaseCount(),
        );
    }
}