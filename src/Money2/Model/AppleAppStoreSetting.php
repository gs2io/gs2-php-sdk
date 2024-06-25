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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class AppleAppStoreSetting implements IModel {
	/**
     * @var string
	 */
	private $bundleId;
	public function getBundleId(): ?string {
		return $this->bundleId;
	}
	public function setBundleId(?string $bundleId) {
		$this->bundleId = $bundleId;
	}
	public function withBundleId(?string $bundleId): AppleAppStoreSetting {
		$this->bundleId = $bundleId;
		return $this;
	}

    public static function fromJson(?array $data): ?AppleAppStoreSetting {
        if ($data === null) {
            return null;
        }
        return (new AppleAppStoreSetting())
            ->withBundleId(array_key_exists('bundleId', $data) && $data['bundleId'] !== null ? $data['bundleId'] : null);
    }

    public function toJson(): array {
        return array(
            "bundleId" => $this->getBundleId(),
        );
    }
}