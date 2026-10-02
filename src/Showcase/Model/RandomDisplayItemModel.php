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
 * Items that can be displayed in a Random Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#randomdisplayitemmodel
 */
class RandomDisplayItemModel implements IModel {
	/**
     * @var string Random Displayed Item ID
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
     * @var int Stock
	 */
	private $stock;
	/**
     * @var int Draw Weight
	 */
	private $weight;
    /** @return string|null Random Displayed Item ID */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Random Displayed Item ID */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Random Displayed Item ID
     * @return RandomDisplayItemModel
     */
	public function withName(?string $name): RandomDisplayItemModel {
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
     * @return RandomDisplayItemModel
     */
	public function withMetadata(?string $metadata): RandomDisplayItemModel {
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
     * @return RandomDisplayItemModel
     */
	public function withVerifyActions(?array $verifyActions): RandomDisplayItemModel {
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
     * @return RandomDisplayItemModel
     */
	public function withConsumeActions(?array $consumeActions): RandomDisplayItemModel {
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
     * @return RandomDisplayItemModel
     */
	public function withAcquireActions(?array $acquireActions): RandomDisplayItemModel {
		$this->acquireActions = $acquireActions;
		return $this;
	}
    /** @return int|null Stock */
	public function getStock(): ?int {
		return $this->stock;
	}
    /** @param int|null $stock Stock */
	public function setStock(?int $stock) {
		$this->stock = $stock;
	}
    /**
     * @param int|null $stock Stock
     * @return RandomDisplayItemModel
     */
	public function withStock(?int $stock): RandomDisplayItemModel {
		$this->stock = $stock;
		return $this;
	}
    /** @return int|null Draw Weight */
	public function getWeight(): ?int {
		return $this->weight;
	}
    /** @param int|null $weight Draw Weight */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
    /**
     * @param int|null $weight Draw Weight
     * @return RandomDisplayItemModel
     */
	public function withWeight(?int $weight): RandomDisplayItemModel {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomDisplayItemModel {
        if ($data === null) {
            return null;
        }
        return (new RandomDisplayItemModel())
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
            ->withStock(array_key_exists('stock', $data) && $data['stock'] !== null ? $data['stock'] : null)
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
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
            "stock" => $this->getStock(),
            "weight" => $this->getWeight(),
        );
    }
}