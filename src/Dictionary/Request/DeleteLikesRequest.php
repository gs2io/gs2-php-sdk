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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteLikes: Delete likes
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#deletelikes
 */
class DeleteLikesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var array List of Entry Model names */
    private $entryModelNames;
    /** @var string */
    private $duplicationAvoider;
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
     * @return DeleteLikesRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteLikesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return DeleteLikesRequest
     */
	public function withAccessToken(?string $accessToken): DeleteLikesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null List of Entry Model names */
	public function getEntryModelNames(): ?array {
		return $this->entryModelNames;
	}
    /** @param array|null $entryModelNames List of Entry Model names */
	public function setEntryModelNames(?array $entryModelNames) {
		$this->entryModelNames = $entryModelNames;
	}
    /**
     * @param array|null $entryModelNames List of Entry Model names
     * @return DeleteLikesRequest
     */
	public function withEntryModelNames(?array $entryModelNames): DeleteLikesRequest {
		$this->entryModelNames = $entryModelNames;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DeleteLikesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteLikesRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteLikesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withEntryModelNames(!array_key_exists('entryModelNames', $data) || $data['entryModelNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['entryModelNames']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "entryModelNames" => $this->getEntryModelNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getEntryModelNames()
            ),
        );
    }
}