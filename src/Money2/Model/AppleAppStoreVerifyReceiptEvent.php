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


class AppleAppStoreVerifyReceiptEvent implements IModel {
	/**
     * @var string
	 */
	private $environment;
	public function getEnvironment(): ?string {
		return $this->environment;
	}
	public function setEnvironment(?string $environment) {
		$this->environment = $environment;
	}
	public function withEnvironment(?string $environment): AppleAppStoreVerifyReceiptEvent {
		$this->environment = $environment;
		return $this;
	}

    public static function fromJson(?array $data): ?AppleAppStoreVerifyReceiptEvent {
        if ($data === null) {
            return null;
        }
        return (new AppleAppStoreVerifyReceiptEvent())
            ->withEnvironment(array_key_exists('environment', $data) && $data['environment'] !== null ? $data['environment'] : null);
    }

    public function toJson(): array {
        return array(
            "environment" => $this->getEnvironment(),
        );
    }
}