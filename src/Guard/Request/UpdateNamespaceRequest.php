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

namespace Gs2\Guard\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Guard\Model\BlockingPolicyModel;

/**
 * Request for updateNamespace: Update Namespace
 *
 * @see https://docs.gs2.io/api_reference/guard/sdk/#updatenamespace
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Description */
    private $description;
    /** @var BlockingPolicyModel Blocking Policy */
    private $blockingPolicy;
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
     * @return UpdateNamespaceRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateNamespaceRequest
     */
	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
    /** @return BlockingPolicyModel|null Blocking Policy */
	public function getBlockingPolicy(): ?BlockingPolicyModel {
		return $this->blockingPolicy;
	}
    /** @param BlockingPolicyModel|null $blockingPolicy Blocking Policy */
	public function setBlockingPolicy(?BlockingPolicyModel $blockingPolicy) {
		$this->blockingPolicy = $blockingPolicy;
	}
    /**
     * @param BlockingPolicyModel|null $blockingPolicy Blocking Policy
     * @return UpdateNamespaceRequest
     */
	public function withBlockingPolicy(?BlockingPolicyModel $blockingPolicy): UpdateNamespaceRequest {
		$this->blockingPolicy = $blockingPolicy;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withBlockingPolicy(array_key_exists('blockingPolicy', $data) && $data['blockingPolicy'] !== null ? BlockingPolicyModel::fromJson($data['blockingPolicy']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "blockingPolicy" => $this->getBlockingPolicy() !== null ? $this->getBlockingPolicy()->toJson() : null,
        );
    }
}