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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;


/**
 * Reward
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#reward
 */
class Reward implements IModel {
	/**
     * @var string Type of Acquire Action
	 */
	private $action;
	/**
     * @var string Request
	 */
	private $request;
	/**
     * @var string Item ID
	 */
	private $itemId;
	/**
     * @var int Value
	 */
	private $value;
    /** @return string|null Type of Acquire Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Type of Acquire Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Type of Acquire Action
     * @return Reward
     */
	public function withAction(?string $action): Reward {
		$this->action = $action;
		return $this;
	}
    /** @return string|null Request */
	public function getRequest(): ?string {
		return $this->request;
	}
    /** @param string|null $request Request */
	public function setRequest(?string $request) {
		$this->request = $request;
	}
    /**
     * @param string|null $request Request
     * @return Reward
     */
	public function withRequest(?string $request): Reward {
		$this->request = $request;
		return $this;
	}
    /** @return string|null Item ID */
	public function getItemId(): ?string {
		return $this->itemId;
	}
    /** @param string|null $itemId Item ID */
	public function setItemId(?string $itemId) {
		$this->itemId = $itemId;
	}
    /**
     * @param string|null $itemId Item ID
     * @return Reward
     */
	public function withItemId(?string $itemId): Reward {
		$this->itemId = $itemId;
		return $this;
	}
    /** @return int|null Value */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Value */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Value
     * @return Reward
     */
	public function withValue(?int $value): Reward {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?Reward {
        if ($data === null) {
            return null;
        }
        return (new Reward())
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withRequest(array_key_exists('request', $data) && $data['request'] !== null ? $data['request'] : null)
            ->withItemId(array_key_exists('itemId', $data) && $data['itemId'] !== null ? $data['itemId'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "action" => $this->getAction(),
            "request" => $this->getRequest(),
            "itemId" => $this->getItemId(),
            "value" => $this->getValue(),
        );
    }
}