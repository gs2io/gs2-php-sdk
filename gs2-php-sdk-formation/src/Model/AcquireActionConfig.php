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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;

/**
 * 入手アクションコンフィグ
 *
 * @author Game Server Services, Inc.
 *
 */
class AcquireActionConfig implements IModel {
	/**
     * @var string スロット名
	 */
	protected $name;

	/**
	 * スロット名を取得
	 *
	 * @return string|null スロット名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スロット名を設定
	 *
	 * @param string|null $name スロット名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スロット名を設定
	 *
	 * @param string|null $name スロット名
	 * @return AcquireActionConfig $this
	 */
	public function withName(?string $name): AcquireActionConfig {
		$this->name = $name;
		return $this;
	}
	/**
     * @var Config[] スタンプシートに使用するコンフィグ
	 */
	protected $config;

	/**
	 * スタンプシートに使用するコンフィグを取得
	 *
	 * @return Config[]|null スタンプシートに使用するコンフィグ
	 */
	public function getConfig(): ?array {
		return $this->config;
	}

	/**
	 * スタンプシートに使用するコンフィグを設定
	 *
	 * @param Config[]|null $config スタンプシートに使用するコンフィグ
	 */
	public function setConfig(?array $config) {
		$this->config = $config;
	}

	/**
	 * スタンプシートに使用するコンフィグを設定
	 *
	 * @param Config[]|null $config スタンプシートに使用するコンフィグ
	 * @return AcquireActionConfig $this
	 */
	public function withConfig(?array $config): AcquireActionConfig {
		$this->config = $config;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "config" => array_map(
                function (Config $v) {
                    return $v->toJson();
                },
                $this->config == null ? [] : $this->config
            ),
        );
    }

    public static function fromJson(array $data): AcquireActionConfig {
        $model = new AcquireActionConfig();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setConfig(array_map(
                function ($v) {
                    return Config::fromJson($v);
                },
                isset($data["config"]) ? $data["config"] : []
            )
        );
        return $model;
    }
}