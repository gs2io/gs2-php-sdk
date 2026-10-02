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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeReferenceOfByUserId: List references by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#describereferenceofbyuserid
 */
class DescribeReferenceOfByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model Name */
    private $inventoryName;
    /** @var string User ID */
    private $userId;
    /** @var string Item Model Name */
    private $itemName;
    /** @var string Name identifying the Item Set */
    private $itemSetName;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return DescribeReferenceOfByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeReferenceOfByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Inventory Model Name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Inventory Model Name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Inventory Model Name
     * @return DescribeReferenceOfByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): DescribeReferenceOfByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return DescribeReferenceOfByUserIdRequest
     */
	public function withUserId(?string $userId): DescribeReferenceOfByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Item Model Name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Item Model Name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Item Model Name
     * @return DescribeReferenceOfByUserIdRequest
     */
	public function withItemName(?string $itemName): DescribeReferenceOfByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return string|null Name identifying the Item Set */
	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}
    /** @param string|null $itemSetName Name identifying the Item Set */
	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}
    /**
     * @param string|null $itemSetName Name identifying the Item Set
     * @return DescribeReferenceOfByUserIdRequest
     */
	public function withItemSetName(?string $itemSetName): DescribeReferenceOfByUserIdRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DescribeReferenceOfByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DescribeReferenceOfByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeReferenceOfByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeReferenceOfByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "itemSetName" => $this->getItemSetName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}