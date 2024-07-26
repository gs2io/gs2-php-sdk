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


class RandomDisplayItemModel implements IModel {
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
     * @var array
	 */
	private $acquireActions;
	/**
     * @var int
	 */
	private $stock;
	/**
     * @var int
	 */
	private $weight;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RandomDisplayItemModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RandomDisplayItemModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
	public function withVerifyActions(?array $verifyActions): RandomDisplayItemModel {
		$this->verifyActions = $verifyActions;
		return $this;
	}
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
	public function withConsumeActions(?array $consumeActions): RandomDisplayItemModel {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
	public function withAcquireActions(?array $acquireActions): RandomDisplayItemModel {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	public function getStock(): ?int {
		return $this->stock;
	}
	public function setStock(?int $stock) {
		$this->stock = $stock;
	}
	public function withStock(?int $stock): RandomDisplayItemModel {
		$this->stock = $stock;
		return $this;
	}
	public function getWeight(): ?int {
		return $this->weight;
	}
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
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
            ->withVerifyActions(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('verifyActions', $data) && $data['verifyActions'] !== null ? $data['verifyActions'] : []
            ))
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
            ->withStock(array_key_exists('stock', $data) && $data['stock'] !== null ? $data['stock'] : null)
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "verifyActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions() !== null && $this->getVerifyActions() !== null ? $this->getVerifyActions() : []
            ),
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
            "stock" => $this->getStock(),
            "weight" => $this->getWeight(),
        );
    }
}